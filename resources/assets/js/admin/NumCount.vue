<template>
    <div>
        <p class="title">2017级新生报道情况统计</p>
        <div class="time">
            <p>
                截止统计时间：{{ getTime() }}
            </p>
        </div>
        <div style="padding:15px;">
            <x-table full-bordered style="background-color:#fff;">
                <thead>
                <tr>
                    <th rowspan="2">班级</th>
                    <th rowspan="2">录取人数</th>
                    <th colspan="2">报到人数</th>
                    <th colspan="2">未到人数</th>
                </tr>
                <tr>
                    <th>男生</th>
                    <th>女生</th>
                    <th>男生</th>
                    <th>女生</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(count1,index) in counts" :key="index" v-if="index!=counts.length-1">
                    <td>{{ count1.class }}</td>
                    <td>{{ count1.enrollment }}</td>

                    <td class="green">{{ count1.reportMen }}</td>
                    <td class="green">{{ count1.reportWomen }}</td>

                    <td class="red">{{ count1.noreportMen }}</td>
                    <td class="red">{{ count1.noreportWomen }}</td>
                </tr>

                <tr>
                    <td rowspan="2">总计</td>
                    <td rowspan="2">{{ counts[countsLen-1].enrollment }}</td>

                    <td class="green">{{ counts[countsLen-1].reportMen }}</td>
                    <td class="green">{{ counts[countsLen-1].reportWomen }}</td>
                    <td class="red">{{ counts[countsLen-1].noreportMen }}</td>
                    <td class="red">{{ counts[countsLen-1].noreportWomen }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="green">{{ counts[countsLen-1].reportMen + counts[countsLen-1].reportWomen }}</td>
                    <td colspan="2" class="red">{{ counts[countsLen-1].noreportMen + counts[countsLen-1].noreportWomen }}</td>
                </tr>

                </tbody>
            </x-table>
        </div>

    </div>
</template>

<script>
    import { XTable } from 'vux'

    export default {
        components: {
            XTable
        },
        data () {
            return {
                counts:{},
                countsLen: 0
            }
        },

        methods:{
            getCount(){
                axios.get('/admin/getcount',{}).then(response => {
                    let data = response.data;
                    if(data.hasOwnProperty('code')){
                        this.$router.push({
                            path:'/admin/login',
                        });
                    }else{
                        this.counts = data;
                        this.countsLen = data.length;
                    }
                }).catch(function(err){
                    console.log(err);
                });
            },
            getTime(){
                var date = new Date();
                var seperator1 = "-";
                var seperator2 = ":";
                var month = date.getMonth() + 1;
                var strDate = date.getDate();
                if (month >= 1 && month <= 9) {
                    month = "0" + month;
                }
                if (strDate >= 0 && strDate <= 9) {
                    strDate = "0" + strDate;
                }
                var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
                    + " " + date.getHours() + seperator2 + date.getMinutes()
                    + seperator2 + date.getSeconds();
                return currentdate;
            },
        },

        mounted (){
            this.getCount();
        }
    }
</script>

<style scoped>
    .title{
        font-size: 1.6em;
        text-align: center;
        color: #2ab27b;
    }
    .red{
        color: red;
    }
    .green{
        color: green;
    }
    .time{
        text-align: center;
    }
</style>