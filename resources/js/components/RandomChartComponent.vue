<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <line-chart :chart-data="data" :height="100"
                            :options="{resposive: true, maintainAspectRation: true}"></line-chart>
            </div>
            <button @click="update" class="btn btn-success">rand</button>
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
                data : []
            }
        },
        mounted() {
            this.update()
        },
        methods: {
            update:function () {
                axios.get('/start/data-chart-rand').then((response) => {
                    this.data = response.data
                });
            }
        }
    }
</script>