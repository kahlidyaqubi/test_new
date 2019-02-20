@extends("layouts._account_layout")

@section("title", "اضافة قسم جديد ")


@section("content")
    <div id="app">
        <div  v-if="Object.keys(messges).length>0" class="alert alert-danger alert-dismissible">
            <ul>
               <li v-for="item in messges">@{{  item[0] }}</li>

            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" id="formid" enctype="multipart/form-data" action="/account/category-axios">
            {{csrf_field()}}
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">اسم القسم<span
                            style='color:red;font-size: 18px'>*</span></label>
                <div class="col-sm-5">
                    <input type="text" autofocus class="form-control" v-model="name" id="name" name="name">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-5 col-md-offset-2">
                    <input type="submit" @click.prevent="addcat" class="btn btn-success" value="اضافة"/>
                    <a href="/account/category" class="btn btn-light">الغاء الامر</a>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data:{
                name:'',
                messges:[],
            },
            methods: {
                addcat:function() {
                    var formaction = $('#formid').attr('action');
                    var mythis=this;

                    axios.post(formaction, {
                        name: mythis.name,
                    })
                        .then(function (response) {
                            console.log(response);
                            if(response.data.type==0){
                               mythis.messges=response.data.data;
                            }


                        })
                        .catch(function (error) {
                            console.log('error');
                            console.log(error);

                        });
                },

            },
        });
    </script>
@endsection