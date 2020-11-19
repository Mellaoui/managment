<template>
    
<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Employee List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Working time</th>
                  <th>Presence %</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <tr v-for="patient in patients" v-bind:key="patient.id">
                      <td><label> {{patient.id}}</label></td>
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
                    <td> {{patient.Working}}</td>
                   
                    <td> {{patient.salary}}</td>
                </tr> 
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
</section>
          <!-- /.card -->


</template>

<script>
export default {
   name: 'app',
  
     data() {
          return{
            patients : {},
          
          }
        },

    methods:{
  loadpatients(){

           axios.get('api/patient')
           .then((response) =>{ this.patients = response.data.patients})
           
          },    
    },

    created(){
            
             this.loadpatients();

             Fire.$on('After', ()=>this.loadpatients())
            //setInterval(()=> this.loadcities(),3000);  

        }
}

</script>
