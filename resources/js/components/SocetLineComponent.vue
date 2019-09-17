<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <line-chart :chart-data="data" :height="100"
                            :options="{resposive: true, maintainAspectRation: true}"></line-chart>
            </div>
            <input type="checkbox" v-model="realtime"> realtime
            <input type="text" v-model="label">
            <input type="text"  v-model="sale">
            <button @click="sendData" class="btn btn-success">Send</button>
        </div>
    </div>
</template>

<script>
    import LineChart from './LineChart.js'

    export default {
        components:{
            LineChart
        },
        data: function(){
            return {
                data : [],
                realtime : false,
                label : "",
                sale : 500,
            }
        },
        mounted() {
            var socket = io('http://api.project-it.top:3000');

            socket.on('news-action:App\\Events\\NewEvent', function (data) {
                this.data = data.result;
                console.log(data.result.datasets)
            }.bind(this));
            // this.update()
        },
        methods: {
            update:function () {
                axios.get('/start/new-event').then((response) => {
                    this.data = response.data
                });
            },
            sendData: function () {
                axios({
                    method : 'get',
                    url: '/ru/start/new-event',
                    params : {
                        label : this.label,
                        sale : this.sale,
                        realtime : this.realtime,
                    }

                }).then((response) => {
                    this.data = response.data
                });
            }
        }
    }
</script>