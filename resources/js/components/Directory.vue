<template>

<div>

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" v-model="item.name" id="name" >
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" v-model="item.title" id="title">
  </div>
<button  class="btn btn-primary" @click="save">{{is_editing?'Update':'Submit'}}</button>

<div style="padding-top:10px;" >

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody v-for="user in list"
    :key="item.id">
    <tr >
      <th scope="row" ></th>
      <td>{{user.name}}</td>
      <td>{{user.title}}</td>
      <td><a href="javascript:void()" class="btn btn-warning" @click="edituser(user)" >Edit</a>
      <a href="javascript:void()" class="btn btn-danger" @click="deleteuser(user.id)" >Delete</a></td>
    </tr>
  </tbody>
</table>
</div>



</div>




</template>



<script>
import axios from 'axios'

export default{
    name:"Directory",
    data(){
        return{

            list:[],
            item:{
                name:"",
                title:""
            },
            is_editing:false,
            temp_id:null
        }
    },
mounted(){
this.fetch();
},
methods:{
    save(){
        let method=axios.post;
        let url='insert'

        if(this.is_editing){
            method=axios.put;
            url=`update/${this.temp_id}`
        }
        try {
            method(url,this.item)
            .then(res=>{
                this.item = {
                    name:"",
                title:""
                }
            })
            this.is_editing=false,
            this.temp_id=null
            this.fetch();
        } catch (error) {
            console.log(error); 
        }
    },
   fetch(){
    try {
            axios.get('getuser')
            .then(res=>{
                this.list = res.data.data
            })
        } catch (error) {
            console.log(error);
        }
   },
   deleteuser(id){
    try {
        axios.post(`delete/${id}`)
        .then(res=>this.fetch())
    } catch (error) {

    }
   },
   edituser(data){
    this.is_editing=true;
    this.temp_id=data.id;
    this.item={
                name:data.name,
                title:data.title
            }

   }

}
}


</script>
