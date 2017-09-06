<template>
    <div>
        <p class="title">完善您的个人信息</p>
        <group>
            <x-input placeholder="请输入您的联系方式" text-align="center" v-model="phone"></x-input>
        </group>
        <group>
            <x-input placeholder="请输入您的家庭联系方式" text-align="center" v-model="home_phone"></x-input>
        </group>
        <group>
            <x-input placeholder="请输入您的家庭住址" text-align="center" v-model="home_address"></x-input>
        </group>
        <group>
            <x-input placeholder="请输入您的微信号" text-align="center" v-model="wx_cord"></x-input>
        </group>
        <group>
            <x-input placeholder="请输入您的QQ号" text-align="center" v-model="qq_cord"></x-input>
        </group>
        <x-button type="primary" class="btn" @click.native="select">提交</x-button>
    </div>
</template>

<script>
    import { XInput, Group, XButton,Grid, GridItem  } from 'vux'
    export default {
        components: {
            XInput,
            XButton,
            Group,
            Grid, 
            GridItem
        },
        data(){
            return {
                phone:'',
                home_phone:'',
                home_address:'',
                wx_cord:'',
                qq_cord:'',
            }
        },
        mounted() {
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
</style>
