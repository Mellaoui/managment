<template>

    <div class="container">
      
        <div class="row justify-content-center">
         <div  class=" col-12">
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-title">Employees</h5>

                        <div  class="card-tools">
                              <button @click="newModal(patients)" class="btn btn-success" data-toggle="modal" data-target="#add-patient"> Add New <i class="icofont-ui-add"></i></button>
                        </div>
                      </div>
                       <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-primary text-white">
                  <th>Nom / Prénom</th>
                  <th>Age</th>
                  <th>Sex</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Experience</th>
                  <th>Salary</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                <tr v-for="patient in patients" v-bind:key="patient.id">
                  <td @click="getId(patient.id)">
                    <a href="#"><strong>{{patient.name}}</strong></a></td>
                  <td><label> {{patient.age}}</label></td>
                  <td><label> {{patient.gender}}</label></td>
                  <td>
                    <div class="d-flex align-items-center nowrap text-primary">
                     {{patient.phone}}
                    </div>
                  </td>
                  <td> <strong>{{patient.status}} </strong></td>
                  <td> {{patient.reason}}</td>
                  <td> {{patient.salary}}</td>
                  <td>

                    <a class="btn btn-success btn-sm btn-square rounded-pill" href="" @click="loadProfile(patient.id)">
                       <i class="btn-icon icofont-patient-file"></i>
                    </a> 

                    <a class="btn btn-primary btn-sm btn-square rounded-pill" href="#" @click="editModal(patient)">
                       <i class="btn-icon icofont-ui-edit" data-toggle="modal" data-target="#Edit" ></i>
                    </a>

                     <a class="btn btn-danger btn-sm btn-square rounded-pill" href="#" @click="deletePatient(patient.id)">
                       <i class="btn-icon icofont-ui-delete"></i>
                    </a>


                    <a class="btn btn-dark btn-sm btn-square rounded-pill" href="#" @click="print(patient)">
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
           </div>-->

           

         <!--Add new record modal-->

           
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

                  <form  class="form-inline" @submit.prevent=" editmode  ?  updatePatient() : addPatient()  " @keydown="form.onKeydown($event)">
                    <!--modal body-->
                  <div class="modal-body" style="padding: 5px;">
                       
                      <div class="col-xs-6 form-group " style="padding-bottom: 10px;">
                          <input v-model="form.name"  id="inputState" class="form-control col-lg-12 col-md-12 col-sm-12"  placeholder="Enter new name" v-bind:class="{ 'is-invalid': form.errors.has('name') }"  style="padding-bottom: 10px;">
                      </div>
                 <div class="row">
                      <div class="col-12 col-sm-6 " style="padding-bottom: 10px;">
                        <div class="form-group">
                           <input  v-model="form.age"  type="number" class="form-control col-lg-12 col-md-12 col-sm-12l" placeholder="Age"  v-bind:class="{ 'is-invalid': form.errors.has('age') }"   style="padding-bottom: 10px;">
                           <has-error :form="form" field="age"></has-error>
                        </div>
                      </div>

                       <div class="col-12 col-sm-6 "  style="padding-bottom: 10px;">
                        <div class="form-group">
                           <input  v-model="form.phone" type="text" class="form-control col-lg-12 col-md-12 col-sm-12" id="phone" placeholder="phone" v-bind:class="{ 'is-invalid': form.errors.has('phone') }"   style="padding-bottom: 10px;">
                           <has-error :form="form" field="phone"></has-error>
                        </div>  
                      </div>   
                 </div>
                  <div class="row"> 
                    <div class="col-12 col-sm-6">
                      <div class=" form-group "  style="padding-bottom: 10px;">
                        <input   v-model="form.gender"  type="text" class="form-control col-lg-12 col-md-12 col-sm-12 " id="gender" placeholder="Gender"  v-bind:class="{ 'is-invalid': form.errors.has('consultation') }"   style="padding-bottom: 10px;">
                        <has-error :form="form" field="gender"></has-error>
                      </div>
                    </div> 
                    <div class="col-12 col-sm-6">
                      <div class=" form-group "   style="padding-bottom: 10px;">
                        <input   v-model="form.status"   type="text" class="form-control col-lg-12 col-md-12 col-sm-12 " id="status " placeholder="Status"  v-bind:class="{ 'is-invalid': form.errors.has('consultation') }"   style="padding-bottom: 10px;">
                        <has-error :form="form" field="consultation"></has-error>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                   <div class="col-12 col-sm-6">
                      <div class=" form-group "   style="padding-bottom: 10px;">
                        <input   v-model="form.working"   type="number" class="form-control col-lg-12 col-md-12 col-sm-12 " id="status " placeholder="Working time"  v-bind:class="{ 'is-invalid': form.errors.has('consultation') }"   style="padding-bottom: 10px;">
                        <has-error :form="form" field="consultation"></has-error>
                      </div>
                    </div>

                      <div class="col-12 col-sm-6 ">
                        <div class="form-group"  style="padding-bottom: 10px;">
                          <input   v-model="form.salary"  type="number" class="form-control col-lg-12 col-md-12 col-sm-12 " id="price " placeholder="Salary"  v-bind:class="{ 'is-invalid': form.errors.has('prix') }"   style="padding-bottom: 10px;">
                          <has-error :form="form"  field="Salary"></has-error>
                        </div>
                      </div>
                  </div>
                      <div class="form-group mb-0 "   style="padding-bottom: 10px;">
                          <textarea  v-model="form.reason" id="motif"  class="form-control col-lg-12 col-md-12 col-sm-12"  placeholder="Experiance" rows="3" v-bind:class="{ 'is-invalid': form.errors.has('name') }"  style="padding-bottom: 10px;"></textarea>
                      </div>
                   
                    <div class="modal-footer">
                      <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button  v-show="editmode" v-bind:disabled="form.busy" type="submit" class="btn btn-success">Save</button>
                      <button  v-show="!editmode" v-bind:disabled="form.busy" type="submit" class="btn btn-primary">Add New</button>
                    </div>
                  </div> 
                   <!--end modal body-->
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
            patients : {},
          
            form: new Form({
                   id:'',
                   name:'',
                   age:'',
                   phone:'',
                   gender:'',
                   status:'',
                   working:'',
                   salary:'',
                   reason:''  
            }),
          }
        },

        methods:{
 //Update function         
           updatePatient(id){
             //console.log('Editing');
             this.form.put('api/patient/'+this.form.id)
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
           editModal(patients){
                    this.editmode = true;        
                    this.form.reset();
                    $('#AddNew').modal('show');
                    this.form.fill(patients);
           } ,
           newModal(){
                    this.editmode = false;
                    this.form.reset();
                    $('#AddNew').modal('show');
           },
//THis is delete patient

          deletePatient(id){
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
            this.form.delete('api/patient/'+ id).then(()=>{
 
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

          loadProfile(id){
            this.form.get('api/patient/'+ id);
            return id;
          },

          print(id){
             window.print();
          },

 //Get patient ID 
          
          getId(id){
            this.form.get('api/patient/'+ id);
            return id;
          },

         

// This is load city

          loadpatients(){

           axios.get('api/patient')
           .then((response) =>{ this.patients = response.data.patients})
           
          },
//THis add city

          addPatient(){
            this.$Progress.start();
            //submit data via POST request
            this.form.post('api/patient').then(()=>{
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
            
             this.loadpatients();

             Fire.$on('After', ()=>this.loadpatients())
            //setInterval(()=> this.loadcities(),3000);  

        }
    }
</script>
