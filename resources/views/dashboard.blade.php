@extends('layouts.app_without_defer')

@section('content')

<div class="container-fluid">
    <br><br><br>
    
    <div class="row justify-content-center">
        
        <div class="col-12 col-lg-6 pb-2">
        
            <div class="card">
              <div class="card-body">

                <div><canvas id="TempChart" height="350"></canvas></div>

              </div>
            </div>  

        </div>

        <div class="col-12 col-lg-6 pb-2">

            <div class="card">
              <div class="card-body">
                    <div><canvas id="HumidChart" height="350"></canvas></div>
              </div>
            </div>

        </div>

        <div class="col-12 col-lg-6 pb-2">
        
            <div class="card">
              <div class="card-body">

                <div><canvas id="PressChart" height="350"></canvas></div>

              </div>
            </div>  

        </div>

        <div class="col-12 col-lg-6 pb-2">
        
            <div class="card">
              <div class="card-body">

                <div><canvas id="PesoChart" height="350"></canvas></div>

              </div>
            </div>  

        </div>
    
    </div>

</div>
@endsection

@section('scripts')
    
    <script type="text/javascript">

        let codigo = <?php echo json_encode($codigo); ?>;
        let chartDataTemp = {
            labels: [],
            datasets: [{ 
                        data: [],
                        label: "Temp Interior",
                        borderColor: "#3e95cd",
                        fill: false
                      },
                      { 
                        data: [],
                        label: "Temp Exterior",
                        borderColor: "#8e5ea2",
                        fill: false
                      },
                    ]
        };
        let chartDataHumid = {
            labels: [],
            datasets: [{ 
                        data: [],
                        label: "Humed Interior",
                        borderColor: "#3e95cd",
                        fill: false
                      },
                      { 
                        data: [],
                        label: "Humed Exterior",
                        borderColor: "#8e5ea2",
                        fill: false
                      },
                    ]
        };
        let chartDataPress = {
            labels: [],
            datasets: [{ 
                        data: [],
                        label: "Pres Interior",
                        borderColor: "#3e95cd",
                        fill: false
                      },
                      { 
                        data: [],
                        label: "Pres Exterior",
                        borderColor: "#8e5ea2",
                        fill: false
                      },
                    ]
        };
        let chartDataPeso = {
            labels: [],
            datasets: [{ 
                        data: [],
                        label: "Peso",
                        borderColor: "#3e95cd",
                        fill: false
                      }
                    ]
        };

        function loadChart(){
            //TEMPERATURA
            const tcx = document.getElementById('TempChart').getContext('2d');
            const TempChart = new Chart(tcx, {
                  type: 'line',
                  data: chartDataTemp,
                  options: {
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            ticks: {
                                callback: function(value, index, ticks) {
                                    return 't'+index;
                                }
                            }
                        }
                    }
                }
            });
            //HUMEDAD
            const hcx = document.getElementById('HumidChart').getContext('2d');
            const HumidChart = new Chart(hcx, {
                  type: 'line',
                  data: chartDataHumid,
                  options: {
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            ticks: {
                                callback: function(value, index, ticks) {
                                    return 't'+index;
                                }
                            }
                        }
                    }
                }
            });
            //PRESION
            const pcx = document.getElementById('PressChart').getContext('2d');
            const PressChart = new Chart(pcx, {
                  type: 'line',
                  data: chartDataPress,
                  options: {
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            ticks: {
                                callback: function(value, index, ticks) {
                                    return 't'+index;
                                }
                            }
                        }
                    }
                }
            });
            //PESO
            const pecx = document.getElementById('PesoChart').getContext('2d');
            const PesoChart = new Chart(pecx, {
                  type: 'line',
                  data: chartDataPeso,
                  options: {
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            ticks: {
                                callback: function(value, index, ticks) {
                                    return 't'+index;
                                }
                            }
                        }
                    }
                }
            });
        }

        $(document).ready(function(){

            $.ajax({
              url:"https://beenet-2cf7b-default-rtdb.firebaseio.com/did/"+codigo+".json",
              type:"GET",
              success:function(response){

                for(clave_medidas in response){
                    let medida_unica = response[clave_medidas];
                    let t_medida = response[clave_medidas].time;

                    if(medida_unica.hasOwnProperty('extract'))
                    {
                        continue;
                    }
                    
                    //TEMPERATURA
                    let itemp_medida = response[clave_medidas].temp;
                    let etemp_medida = response[clave_medidas].etemp;
                    //HUMEDAD
                    let ihumid_medida = response[clave_medidas].humid;
                    let ehumid_medida = response[clave_medidas].ehumid;
                    //PRESION
                    let ipress_medida = response[clave_medidas].press;
                    let epress_medida = response[clave_medidas].epress;
                    //PESO
                    let peso_medida = response[clave_medidas].peso;

                    let t_medida_humana = new Date(t_medida*1000);
                    let t_medida_humana_completa = t_medida_humana.toLocaleDateString("default") + " " +t_medida_humana.toLocaleTimeString("default");

                    //TEMPERATURA
                    chartDataTemp.labels.push(t_medida_humana_completa);
                    (chartDataTemp.datasets)[0].data.push(itemp_medida);
                    (chartDataTemp.datasets)[1].data.push(etemp_medida);
                    //HUMEDAD
                    chartDataHumid.labels.push(t_medida_humana_completa);
                    (chartDataHumid.datasets)[0].data.push(ihumid_medida);
                    (chartDataHumid.datasets)[1].data.push(ehumid_medida);
                    //PRESION
                    chartDataPress.labels.push(t_medida_humana_completa);
                    (chartDataPress.datasets)[0].data.push(ipress_medida);
                    (chartDataPress.datasets)[1].data.push(epress_medida);
                    //PESO
                    chartDataPeso.labels.push(t_medida_humana_completa);
                    (chartDataPeso.datasets)[0].data.push(peso_medida);
                }
                loadChart();

              },
              error: function(xhr, textStatus, error){
              }
            });

        });
    </script>

@endsection