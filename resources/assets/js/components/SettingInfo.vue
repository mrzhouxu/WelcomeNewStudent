<template>
    <div class="form">
        <p class="title">完善您的个人信息</p>
        <group>
            <x-input label-width="120px" title="联系方式" placeholder="请输入您的联系方式" text-align="left" v-model="stu_info.phone_num"></x-input>
        </group>
        <group>
            <x-input label-width="120px" title="家庭联系方式" placeholder="请输入您的家庭联系方式" text-align="left" v-model="stu_info.family_num"></x-input>
        </group>
        <group>
            <x-input label-width="120px" title="家庭住址" placeholder="请输入您的家庭住址" text-align="left" v-model="stu_info.address"></x-input>
        </group>
        <group>
            <x-input label-width="120px" title="微信号" placeholder="请输入您的微信号" text-align="left" v-model="stu_info.wechat_id"></x-input>
        </group>
        <group>
            <x-input label-width="120px" title="QQ号" placeholder="请输入您的QQ号" text-align="left" v-model="stu_info.qq_id"></x-input>
        </group>
        <x-button type="primary" class="btn" @click.native="submit">提交</x-button>
        <loading :show="loading" text="正在保存"></loading>
    </div>
</template>

<script>
    import { XInput, Group, XButton,Grid, GridItem ,Loading,ToastPlugin } from 'vux'
    Vue.use(ToastPlugin);
    export default {
        components: {
            XInput,
            XButton,
            Group,
            Grid, 
            GridItem,
            Loading
        },
        data(){
            return {
                phone:'',
                home_phone:'',
                home_address:'',
                wx_cord:'',
                qq_cord:'',
                stu_info:{},
                loading:false,
            }
        },
        methods:{
            getInfo($id){
                axios.get('info/get',{
                    params:{id:$id}
                })
                .then(res=>{
                    if(res.data.status == 3){
                        this.$vux.toast.show({
                        text: 'Loading'
                        })
                        this.$vux.toast.show({
                            text: '没有权限！',
                            type: 'warn'
                        })
                        this.$router.push({ path: '/' })
                        return false;
                    }
                    this.stu_info = res.data;
                })
                .catch(function(error){
                });
            },
            submit(){
                if($.trim(this.stu_info.phone_num.length) != 11 || $.trim(this.stu_info.family_num.length) != 11){
                    this.$vux.toast.show({
                        text: 'Loading'
                        })
                        this.$vux.toast.show({
                            text: '请输入正确的联系方式！',
                            type: 'warn'
                        })
                        return false;
                }
                this.loading = true;
                axios.post('updateInfo',{
                    stu_info:this.stu_info
                })
                .then(res=>{
                    this.loading = false;
                    if(res.data.status == 1){
                        this.$router.push({ path: '/info/'+this.stu_info.id })
                    }else if(res.data.status == 0){
                        this.$vux.toast.show({
                        text: 'Loading'
                        })
                        this.$vux.toast.show({
                            text: '失败！',
                            type: 'warn'
                        })
                    }
                })
                .catch(function(error){
                    this.loading = false;
                    this.$vux.toast.show({
                        text: 'Loading'
                        })
                        this.$vux.toast.show({
                            text: '失败！',
                            type: 'warn'
                        })
                });
            }
        },
        mounted() {
            this.getInfo(this.$route.params.id);
        }
    }
</script>
<style scoped>
.title{
    text-align:center;
    font-weight: 700;
    text-shadow: 10px 10px 10px rgb(200, 200, 200);
    font-size:32px;
}
.btn{
    margin:1.5rem 0;
    font-size:16px;
    padding:4px;
  }
  .weui-input{
      color:#777;
  }
</style>
<style>
.form{
    padding:0 8px;
}
.form .weui-input{
      color:#777;
}
</style>

