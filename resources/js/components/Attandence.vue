<template>
  

  <div id="app" class="form-group">
                  

                     <div class="block">
    <label class="demonstration">Date range:</label>
    <el-date-picker
      v-model="value1"
      type="datetime"
      placeholder="Select date and time">
    </el-date-picker>
  </div>
                  <!-- /.input group -->
        <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Employee Attendance List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Time-in</th>
                  <th>Time-out</th>
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
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
</section>
                </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker'
     
export default {
   name: 'app',
   
     data() {
          return{
            editmode : false,
            patients : {},
            pickerOptions: {
          shortcuts: [{
            text: 'Today',
            onClick(picker) {
              picker.$emit('pick', new Date());
            }
          }, {
            text: 'Yesterday',
            onClick(picker) {
              const date = new Date();
              date.setTime(date.getTime() - 3600 * 1000 * 24);
              picker.$emit('pick', date);
            }
          }, {
            text: 'A week ago',
            onClick(picker) {
              const date = new Date();
              date.setTime(date.getTime() - 3600 * 1000 * 24 * 7);
              picker.$emit('pick', date);
            }
          }]
        }, 
        value1: '',
        value2: '',
        value3: '',
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