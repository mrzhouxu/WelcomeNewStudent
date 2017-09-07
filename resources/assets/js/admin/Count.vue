<template>
    <div>
        <tab class="title">
            <tab-item selected @on-item-click="onClick(1)">报到</tab-item>
            <tab-item @on-item-click="onClick(0)">未报到</tab-item>
        </tab>

        <div class="content"  v-if="status === 1">
            <x-table full-bordered style="background-color:#fff;">
                <thead>
                <tr>
                    <th>姓名</th>
                    <th>班级</th>
                    <th>性别</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="student in reportstu">
                    <td>{{ student.name }}</td>
                    <td>{{ student.class }}</td>
                    <td>{{ student.sex }}</td>
                </tr>

                </tbody>
            </x-table>
        </div>

        <div class="content"  v-if="status === 0">
            <x-table full-bordered style="background-color:#fff;">
                <thead>
                <tr>
                    <th>姓名</th>
                    <th>班级</th>
                    <th>性别</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="student in noreportstu">
                    <td>{{ student.name }}</td>
                    <td>{{ student.class }}</td>
                    <td>{{ student.sex }}</td>
                </tr>

                </tbody>
            </x-table>
        </div>

        <load-more v-if="isshow" tip="正在加载"></load-more>

        <load-more v-if="full[status]" tip="已加载全部数据" :show-loading="false"></load-more>
    </div>
</template>

<script>
    import { Tab, TabItem, XTable, LoadMore, Scroller } from 'vux'

    export default {
        components: {
            Tab, TabItem, XTable, LoadMore, Scroller
        },

        data () {
            return {
                reportstu: [],
                noreportstu: [],
                page: [0, 0],
                isshow: false,
                status: 1,
                full: [false, false]
            }
        },
        methods: {
            onClick(val){
                this.status = val;
            },
            info(){


                axios.get('/admin/count',{
                    params:{
                        status: 1,
                        page: 0
                    }
                }).then(response => {
                    let data = response.data;
                    if(data.hasOwnProperty('code')){
                        this.$router.push({
                            path:'/admin/login',
                        });
                    }else{
                        this.reportstu = data;
                    }
                }).catch(function(err){
                    console.log(err);
                });


                axios.get('/admin/count',{
                    params:{
                        status: 0,
                        page: 0
                    }
                }).then(response => {
                    let data = response.data;
                    if(data.hasOwnProperty('code')){
                        this.$router.push({
                            path:'/admin/login',
                        });
                    }else{
                        this.noreportstu = data;
                    }

                }).catch(function(err){
                    console.log(err);
                });
            }

        },
        mounted (){
            this.info();


            let sw = true;

            // 注册scroll事件并监听
            window.addEventListener('scroll',() => {
            // console.log(document.documentElement.clientHeight+'-----------'+window.innerHeight); // 可视区域高度
            // console.log(document.body.scrollTop); // 滚动高度
            // console.log(document.body.offsetHeight); // 文档高度
            // 判断是否滚动到底部


                if((document.body.scrollTop + window.innerHeight >= document.body.offsetHeight) && !this.full[this.status]) {

                    //  console.log(sw);
                    // 如果开关打开则加载数据
                    if(sw === true){
                        // 将开关关闭
                        sw = false;
                        this.page[this.status]++;
                        this.isshow = true;
                        axios.get('/admin/count',{
                            params:{
                                status: this.status,
                                page: this.page[this.status]
                            }
                        }).then(response => {
                            console.log(response.data.length);
                            this.isshow = false;
                            if(response.data.length === 0){
                                this.full[this.status] = true;
                            }else{
                                if(this.status === 0) {
                                    (response.data).forEach((val,index) => {
                                        this.noreportstu.push(val);
                                    });
                                    console.log(this.reportstu);
                                }else{
                                    (response.data).forEach((val,index) => {
                                        this.reportstu.push(val);
                                    });
                                }
                            }

                            sw = true;


                        }).catch(function(err){
                            console.log(err);
                        });
                    }
                }
            });

        }
    }
</script>

<style scoped>
    .title{
        position: fixed !important;
        width: 100%;
        z-index: 10;
        top: 0;
        left: 0;
    }
    .content{
        margin-top: 50px;
    }
</style>


