<template>
<div>
<div class="card">
  <div class="card-header">
    <div class="row">
        <div class="col-6">
            <h4 class="text-muted my-3 h5">Category List</h4></div>
        <div class="col-6">
            <button type="button" @click="addCategory" class="float-end btn btn-info" data-toggle="modal" data-target="#exampleModal">Add Category</button>
        </div>
    </div>
  </div>
  <div class="card-body">
    <div class="input-group m-3" style="max-width:360px">
        <input type="text" class="form-control col-6" placeholder="search">
        <div class="input-group-append">
            <button class="btn btn-dark" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>
    <div class="card bg-dark text-white mb-3 mx-3" v-for="category in categories" :key="category.id">
        <div class="card-body">
            <div class="row">
                <div class="col-6">{{category.title}}</div>
                <div class="col-6">
                    <div class="float-end">
                    <a href="#" @click="editCategory(category)" data-toggle="modal" data-target="#exampleModal" class="text-capitalize text-decoration-none px-2 text-info">edit</a> 
                    <a href="#" @click="deleteCategory(category)" class="text-capitalize text-decoration-none px-2 text-warning">delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Category</h5>
        <button type="button" class="btn-close" data-dismiss="modal" id="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="image" class="form-label">title</label>
                <input class="form-control" name="title" v-model="title"  type="text">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">description</label>
                <textarea name="description" class="form-control" rows="5" style="resize:none" v-model="description"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
        <button type="button" @click="submitCategory" class="btn btn-primary" v-text="this.submit"></button>
      </div>
    </div>
  </div>
</div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                categories:[],
                id:'',
                title:'',
                description:'',
                submit:'add',
            }
        },
        created() {
            this.getCategories()
        },
        methods: {
            getCategories() {
                axios
                .get('/api/categories')
                .then(response => this.categories = response.data)
                .catch(error => console.log(error))
            },
            editCategory(category) {
                this.id = category.id;
                this.title = category.title;
                this.submit = 'edit'
                this.description = category.description;
            },
            addCategory() {
                this.title = '';
                this.submit = 'add'
                this.description = '';
            },
            submitCategory() {
                if(this.submit === 'add') {
                    axios
                    .post('/api/categories', {
                        title : this.title,
                        description : this.description
                    })
                    .then(this.getCategories)
                    .catch(error => console.log(error));
                    document.getElementById("close").click();
                }
                else {
                    axios
                    .put('/api/categories', {
                        id:this.id,
                        title : this.title,
                        description : this.description
                    })
                    .then(this.getCategories)
                    .catch(error => console.log(error));
                    document.getElementById("close").click();
                }
            },
            deleteCategory(category) {
                if(confirm("Do you really want to delete??!!")){
                axios
                .post('/api/categories/delete',{
                    id:category.id
                })
                .then(this.getCategories)
                .catch(error => console.log(error))
                }
            }
        }
    }
</script>
