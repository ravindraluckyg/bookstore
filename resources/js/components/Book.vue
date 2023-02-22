<template>
    <div>
        <div class="container" v-if="showList">
            <div class="row justify-content-center">
                <div class="col-md-8 mt-2">
                    <div class="card">
                        <div class="row">

                            <div class="col-sm-6">
                                <label for="">Search</label>
                                <input type="text" name="keyword" class="form-control" placeholder="Search.." v-model="keyword" @keyup="list">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Limit</label>
                                <select name="limit" v-model="limit" @change="list" class="form-control">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 mt-2" v-for="(book, index) in books.data" :key="book.id">
                                <a href="#" class="thumbnail" @click="viewBook(book)">
                                    <img :src='book.image' :alt='book.title' style="height:auto;width: 100%;">
                                    <div class="caption">
                                        <h4>{{book.title}}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <pagination align="center" :data="books" @pagination-change-page="list"></pagination>

                    </div>
                </div>
            </div>
        </div>

        <div class="container" v-if="!showList">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <img :src='book.image' :alt='book.title' style="height:auto;width: 100%;">
                            </div>

                            <div class="col-sm-8">
                                <div class="float-end">
                                    <a class="btn btn-primary btn-sm" href="#" @click="goBack">&times;</a>
                                </div>
                                <h2>
                                    <label id="lblProductTitle">{{book.title}}</label>
                                </h2>
                                <p style="color: #717171">
                                    <label id="lblauthor">By: {{book.author}}(Author) | </label>
                                   
                                        <label id="lblpublisher">Publisher: {{book.publisher}} | </label>
                                    <label id="lblpubdate">Released: {{book.published}} | </label>
                                </p>
                                <p>
                                    <label id="lblLongDesc">{{book.description}}</label>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</template>

<script>
    import pagination from 'laravel-vue-pagination'
    export default {
        components:{
            pagination
        },
        data() {
            return {
                limit: 10,
                showList: true,
                keyword: '',
                book: {},
                books:{
                    type:Object,
                    default:null
                }
            }
        },
        mounted(){
            this.list()
        },
        methods:{
            async list(page=1){
                await axios.get(`/api/books?page=${page}&limit=${this.limit}&keyword=${this.keyword}`).then(({data})=>{
                    this.books = data
                }).catch(({ response })=>{
                    console.error(response)
                })
            },
            viewBook(book){
                this.showList = false;
                this.book = book;
            },
            goBack(){
                this.showList = true;
                this.book = {};
            }
        }
    }
</script>
