<template>
    <div class="container">

        <div class="row">
            <div class="col col-12 col-md-6 col-xl-3">
                <div class="card animated fadeInUp delay-01s bg-light">
                    <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col col-5">
                            <div class=" icon p-0 fs-48 text-primary opacity-50 icofont-institution"></div>
                        </div>
                        <div class="col col-7">
                                <h6 class="mt-0 mb-1">Departments</h6>
                                <div class="count text-primary fs-20">1</div>
                        </div>
                        </div>                    
                    </div>      
                </div>
            </div> 
            <div class="col col-12 col-md-6 col-xl-3">
                <div class="card animated fadeInUp delay-02s bg-light">
                    <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col col-5">
                            <div class="icon p-0 fs-48 text-primary opacity-50 icofont-users-alt-1"></div>                          
                        </div>
                        <div class="col col-7">
                                <h6 class="mt-0 mb-1">Employees N°</h6>
                                <div  class="count text-primary fs-20">{{Allpatients}}</div>
                        </div>
                        </div>                    
                    </div>      
                </div>
            </div> 
             <div class="col col-12 col-md-6 col-xl-3">
                <div class="card animated fadeInUp delay-03s bg-light">
                    <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col col-5">
                            <div class="icon p-0 fs-48 text-primary opacity-50 icofont-user-suited"></div>
                        </div>
                        <div class="col col-7">
                                <h6 class="mt-0 mb-1">Admins</h6>
                                <div class="count text-primary fs-20">5</div>

                            </div>
                        </div>                    
                    </div>      
                </div>
            </div> 
             <div class="col col-12 col-md-6 col-xl-3">
                <div class="card animated fadeInUp delay-04s bg-light">
                    <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col col-5">
                            <div class="icon p-0 fs-48 text-primary opacity-50 icofont-dollar-true"></div>
                        </div>
                        <div class="col col-7">
                                <h6 class="mt-0 mb-1">Revenue</h6>
                                <div class="count text-primary fs-20">30</div>

                        </div>
                        </div>                    
                    </div>      
                </div>
            </div> 
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Presence percentage %</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820 day</span>
                    <span></span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p>
                </div>
                <!-- /.d-flex -->

               <div v-for="todo in AllTodos" v-bind:key="todo.id" class="Todos">
               {{todo.title}}
               </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions} from 'vuex';
    export default {
        name:"todos",
        name:"patients",
        //name: 'app',
        
        methods:{
            ...mapActions(["fetchTodos"]),
            ...mapActions(["fetchPatients"])
            },
        
        computed: mapGetters(['AllTodos']),
        computed: mapGetters(['Allpatients']),
          
      
         
            
        created(){
            this.fetchTodos();
            this.fetchPatients()
             

        }
         
        
    };
</script>