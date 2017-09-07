<template>
    <div>
        <p class="title">登录</p>
        <group title="">
            <x-input title="账号" placeholder="请输入账号"  v-model="account"></x-input>
            <x-input title="密码" placeholder="请输入密码" type='password'  v-model="password" @on-enter="login"></x-input>
        </group>

        <group>
            <x-button type="primary" @click.native="login" >用户登录</x-button>
        </group>
    </div>
</template>

<script>
    import { XInput, Group, XButton, ToastPlugin } from 'vux'
    Vue.use(ToastPlugin);
    export default {
        components: {
            XInput,
            XButton,
            Group,
        },
        data () {
            return {
                account:'',
                password:''
            }
        },
        methods: {
            login(){
                axios.post('/admin/login',{
                    account: this.account,
                    password: this.password
                }).then(response => {
                    console.log(response.data);
                    let data = response.data;
                    console.log(parseInt(data.code));
                    if(parseInt(data.code) === 0){
                        this.$vux.toast.show({
                            text: data.msg,
                            type: 'warn'
                        });
                    }else{
                        this.$router.push({
                            path:'/admin/count',
                        });
                    }
                }).catch(function(err){
                    console.log(err);
                });
            },
        }
    }
</script>
<style scoped>
    .title{
        font-size: 3em;
        text-align: center;
        color: #2ab27b;
    }
</style>