<template>

    <div class="container">
      
        <div class="row justify-content-center" >
         <div  class=" col-12">
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-title">Users</h5>

                        <div  class="card-tools">
                              <button @click="newModal(users)" class="btn btn-success" data-toggle="modal" data-target="#add-patient"> <i class="icofont-ui-add"></i></button>
                        </div>
                      </div>
                       <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-primary text-white">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                <tr v-for="user in users" v-bind:key="user.id">
                  <td @click="getId(user.id)">
                    <a href="#"><strong>{{user.id}}</strong></a></td>
                    <td><a href="#"><strong>{{user.name}}</strong></a></td>
                  <td><label> {{user.email}}</label></td>
                  <td><label> {{user.type}}</label></td>
                 
                  <td>

                    <a class="btn btn-success btn-sm btn-square rounded-pill" href="pricing" @click="addConsultation(patient.id)">
                       <i class="btn-icon icofont-patient-file"></i>
                    </a> 

                    <a class="btn btn-primary btn-sm btn-square rounded-pill" href="#" @click="editModal(user)">
                       <i class="btn-icon icofont-ui-edit" data-toggle="modal" data-target="#Edit" ></i>
                    </a>

                     <a class="btn btn-danger btn-sm btn-square rounded-pill" href="#" @click="deletePatient(user.id)">
                       <i class="btn-icon icofont-ui-delete"></i>
                    </a>


                    <a class="btn btn-dark btn-sm btn-square rounded-pill" href="#" @click="print(user)">
                       <i class="btn-icon icofont-print"></i>
                    </a>
                  
                  </td>
                </tr>
           
                </tbody>
                <tfoot>
                      @scratch
                </tfoot>
              </table>
            <!-- /.card-body -->
          </div>
           
          <!-- /.card -->
        </div>

      
         <div class="">

         </div>
         </div>
        </div>
        <!-- Modal -->
         <!--- <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                  <div class="modal-header">
                   <h5 class="modal-title" id="EditTitle">Update City info</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                   </button>
                  </div>
               <div class="modal-body">
                    <form  @submit.prevent="updateCity" @keydown="form.onKeydown($event)">
                        <select  class="col-xs-6 form-group" >
                           <option v-for="city in cities" v-bind:key="city.id" >{{city.wilaya}}</option>
                        </select> 
                        <div class="col-xs-6 form-group">
                          <input type="number" class="form-control" id="inputNumber" placeholder="Number">
                        </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-success">Save changes</button>
                         </div>
                     </form>  
               </div>
              </div>
            </div>
           </div>--->
         <!---Add new record modal-->

           
          <div class="modal fade" id="AddNew" tabindex="-1" role="dialog"  style=" padding-right:15px;" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered " role="document">
                <!--modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                   <h5 class="modal-title" v-show="!editmode" id="AddnewTitle"><i class="fa fa-hospital-user"></i>Add New</h5>
                   <h5 class="modal-title" v-show="editmode" id="AddnewTitle">Update Employees</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                   </button>
                  </div>
                 <!--end modal content-->

                  <form  class="form-inline" @submit.prevent=" editmode  ?  updateUser() : addUser()  " @keydown="form.onKeydown($event)">
                    <!--modal body-->
                  <div class="modal-body" style="padding: 5px;">
                       
                      <div class="col-xs-6 form-group " style="padding-bottom: 10px;">
                          <input v-model="form.name"  id="inputState" class="form-control col-lg-12 col-md-12 col-sm-12"  placeholder="Enter new name" v-bind:class="{ 'is-invalid': form.errors.has('name') }"  style="padding-bottom: 10px;">
                      </div>
                 <div class="row">
                      <div class="col-12 col-sm-6 " style="padding-bottom: 10px;">
                        <div class="form-group">
                           <input  v-model="form.email"  type="text" class="form-control col-lg-12 col-md-12 col-sm-12l" placeholder="Email"  v-bind:class="{ 'is-invalid': form.errors.has('email') }"   style="padding-bottom: 10px;">
                           <has-error :form="form" field="email"></has-error>
                        </div>
                      </div>

                       <div class="col-12 col-sm-6 "  style="padding-bottom: 10px;">
                        <div class="form-group">
                           <input  v-model="form.password" type="password" class="form-control col-lg-12 col-md-12 col-sm-12" id="password" placeholder="Password" v-bind:class="{ 'is-invalid': form.errors.has('password') }"   style="padding-bottom: 10px;">
                           <has-error :form="form" field="phone"></has-error>
                        </div>  
                      </div>  
                       <div class="col-12 col-sm-6 "  style="padding-bottom: 10px;">
                        <div class="form-group">
                           <input  v-model="form.photo" type="text" class="form-control col-lg-12 col-md-12 col-sm-12" id="photo" placeholder="Photo" v-bind:class="{ 'is-invalid': form.errors.has('password') }"   style="padding-bottom: 10px;">
                           <has-error :form="form" field="photo"></has-error>
                        </div>  
                      </div>   
                 </div>
                  <div class="row"> 
                    <div class="col-12 col-sm-6">
                      <div class=" form-group "  style="padding-bottom: 10px;">
                        <input   v-model="form.type"  type="text" class="form-control col-lg-12 col-md-12 col-sm-12 " id="type" placeholder="Type"  v-bind:class="{ 'is-invalid': form.errors.has('type') }"   style="padding-bottom: 10px;">
                        <has-error :form="form" field="gender"></has-error>
                      </div>
                    </div> 
                    <div class="col-12 col-sm-6">
                      <div class="form-group "   style="padding-bottom: 10px;">
                          <select name="type" v-model="form.type" id="type" class="form-control" v-bind="{'is-invalid': form.errors.has('type')}">
                              <option value="">Select</option>
                              <option value="admin">Admin</option>
                              <option value="user">Standrad User</option>
                              <option value="author">Author</option>
                          </select>
                      </div>
                    </div>
                  </div>    
                   
                      <div class=" form-group "   style="padding-bottom: 10px;">
                        <textarea   v-model="form.bio"   type="text" class="form-control col-lg-12 col-md-12 col-sm-12 " id="bio " placeholder="Bio"  v-bind:class="{ 'is-invalid': form.errors.has('bio') }"   style="padding-bottom: 10px;"></textarea>
                        <has-error :form="form" field="bio"></has-error>
                      </div>
                    
                    <div class="modal-footer">
                      <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button  v-show="editmode" v-bind:disabled="form.busy" type="submit" class="btn btn-success">Save</button>
                      <button  v-show="!editmode" v-bind:disabled="form.busy" type="submit" class="btn btn-primary">Add New</button>
                    </div>
                  </div> 
                   <!---end modal body-->
                  </form>
                
                </div>
              </div>
           </div>

          
                     
    </div>
       
   
</template>

<script>
    export default {
            
        data() {
          return{
            editmode : false,
            users : {},
          
            form: new Form({
                   id:"",
                   name:'',
                   email:'',
                   password:'',
                   type:'',
                   bio:'',
                   photo:'', 
            }),
          }
        },

        methods:{
 //Update function         
           updateUser(id){
             //console.log('Editing');
             this.form.put('api/user/'+this.form.id)
             .then(()=>{
                  //success
                   Fire.$emit('After') ;

            $('#AddNew').modal('hide');
            toast.fire({
            icon: 'success',
            title: 'Updated successfully'
             });

             })
             .catch(()=>{
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href>Why do I have this issue?</a>'
               })

             });
           },

//this edit Modal
           editModal(users){
                    this.editmode = true;        
                    this.form.reset();
                    $('#AddNew').modal('show');
                    this.form.fill(users);
           } ,
           newModal(){
                    this.editmode = false;
                    this.form.reset();
                    $('#AddNew').modal('show');
           },
//THis is delete patient

          deleteUser(id){
          Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
             }).then((result) => {
            //Send request to the server
             if(result.value){
            this.form.delete('api/user/'+ id).then(()=>{
 
             Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                  )
                   Fire.$emit('After') ;    
             }).catch(()=>{
               Swal("Failed","There was something wrong","warning");
             });
             
             }

           })
          },

          print(id){
             window.print();
          },

 //Get patient ID 
          
          getId(id){
            this.form.get('api/user/'+ id);
            return id;
          },

         

// This is load city

          loadUsers(){
           
            axios.get("api/user").then((response) =>{ this.users = response.data.users})
          },
//THis add city

          addUser(){
            this.$Progress.start();
            //submit data via POST request
            this.form.post('api/user').then(()=>{
               Fire.$emit('After') ;

            $('#AddNew').modal('hide');
            toast.fire({
            icon: 'success',
            title: 'Added successfully'
             });

             this.$Progress.finish();
            })
            .catch(()=>{
              Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong!',
              footer: '<a href>Why do I have this issue?</a>'
               })
            })

           
          }
        },
//This once it's created 

        created(){
            
             this.loadUsers();

             Fire.$on('After', ()=>this.loadUsers())
            //setInterval(()=> this.loadcities(),3000);  

        }
    }
</script>
