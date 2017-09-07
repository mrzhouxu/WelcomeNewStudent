<template>
    <div>
        <tab>
            <tab-item selected @on-item-click="onClick(1)">报到</tab-item>
            <tab-item @on-item-click="onClick(0)">未报到</tab-item>
        </tab>

        <div style="padding:15px;">

            <x-table full-bordered style="background-color:#fff;">
                <thead>
                <tr>
                    <th>姓名</th>
                    <th>班级</th>
                    <th>性别</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="student in students">
                    <td>{{ student.name }}</td>
                    <td>{{ student.class }}</td>
                    <td>{{ student.sex }}</td>
                </tr>

                </tbody>
            </x-table>
        </div>
        <load-more v-if="isshow" tip="正在加载"></load-more>

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
                students: [],
                page: 0,
                isshow: false,
                status: 1
            }
        },
        methods: {
            onClick(val){
                this.page = 0;
                this.status = val;
                axios.get('/admin/count',{
                    params:{
                        status: val,
                        page: this.page
                    }
                }).then(response => {
                    console.log(response.data);
                    let data = response.data;
                    if(data.hasOwnProperty('code')){
                        this.$router.push({
                            path:'/admin/login',
                        });
                    }else
                        this.students = response.data;
                }).catch(function(err){
                    console.log(err);
                });
            }

        },
        mounted (){
            this.onClick(1);

            let sw = true;

            // 注册scroll事件并监听
            window.addEventListener('scroll',() => {
                // console.log(document.documentElement.clientHeight+'-----------'+window.innerHeight); // 可视区域高度
                // console.log(document.body.scrollTop); // 滚动高度
                // console.log(document.body.offsetHeight); // 文档高度
                // 判断是否滚动到底部
                if(document.body.scrollTop + window.innerHeight >= document.body.offsetHeight) {
                     console.log(sw);
                    // 如果开关打开则加载数据
                    if(sw === true){
                        // 将开关关闭
                        sw = false;
                        this.page++;
                        this.isshow = true;
                        axios.get('/admin/count',{
                            params:{
                                status: this.status,
                                page: this.page
                            }
                        }).then(response => {
//                            console.log(response.data);
                            (response.data).forEach((val,index) => {
                                this.students.push(val);
                            });
                            sw = true;
                            this.isshow = false;
                        }).catch(function(err){
                            console.log(err);
                        });
                    }
                }
            });
        }
    }



</script>