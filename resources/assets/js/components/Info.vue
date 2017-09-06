<template>
    <div>
        <p class="title">我的信息</p>
        <grid :rows="2" style="text-align:center;padding:0;" class="but_group">
            <grid-item  class="item">
                <x-button type="primary" class="btn" @click.native="edit" mini>编辑信息</x-button>
            </grid-item>
            <grid-item  class="item">
                <x-button type="primary" class="btn" @click.native="show_map=!show_map" mini >查看地图</x-button>
            </grid-item>
        </grid>
        

        <group class="stu_info">
            <x-input title='姓名' value="张梦果" disabled></x-input>
            <x-input title='身份证号' value="411321199406153928" disabled></x-input>
            <x-input title='性别' value="女" disabled></x-input>
            <x-input title='班级' value="计科(专升本)171" disabled></x-input>
            <x-input title='宿舍' value="4#217" disabled></x-input>
            <x-input title='辅导员联系方式' value="13523246642" disabled></x-input>
            <x-input title='班主任联系方式' value="18238773893" disabled></x-input>
            <x-input title='代班联系方式' value="15136760157,15837587256" disabled></x-input>
            <x-input title='联系方式' value="disabledValue" disabled></x-input>
            <x-input title='家庭联系方式' value="disabledValue" disabled></x-input>
            <x-input title='家庭住址' value="disabledValue" disabled></x-input>
            <x-input title='微信号' value="disabledValue" disabled></x-input>
            <x-input title='QQ号' value="disabledValue" disabled></x-input>
        </group>

        <div v-transfer-dom style="width:100%;height:100%;" class="map">
            <x-dialog v-model="show_map" class="dialog-demo" hide-on-blur>
                <div class="img-box">
                <img src="img/banner.jpg" style="max-width:100%;height:100%;transform: rotate(90deg);">
                </div>
                <div @click="show_map=false">
                <span class="vux-close"></span>
                </div>
            </x-dialog>
        </div>
        
    </div>
</template>

<script>
    import { XInput, Group, XButton,Grid, GridItem,Actionsheet,XDialog, TransferDomDirective as TransferDom   } from 'vux'
    export default {
        directives: {
            TransferDom
        },
        components: {
            XInput,
            XButton,
            Group,
            Grid, 
            GridItem,
            Actionsheet,
            TransferDom,
            XDialog            
        },
        data(){
            return {
                disabledValue:'',
                show_map:false
            }
        },
        methods:{
            edit(){
                this.$router.push({ path: '/info/set' });
            }
            
        },
        mounted() {
            
        }
    }
</script>
<style>
.stu_info .weui-input{
      color: #777;
  }
.map{
    width:100%;
    height:100%;
}
.map div{
    width:100%;
    height:100%;
}
.map .weui-dialog{
    max-width:100%;
}
.but_group .weui-grid{
    padding:0;
}
</style>

<style scoped>
.title{
    text-align:center;
    font-weight: 700;
    text-shadow: 10px 10px 10px rgb(200, 200, 200);
    font-size:32px;
}
.btn{
    margin:1rem 0;
    font-size:16px;
    padding:4px;
    width:80%;
  }

</style>
<style lang="less" scoped>
@import '~vux/src/styles/close';

.dialog-demo {
  .weui-dialog{
    border-radius: 8px;
    padding-bottom: 8px;
  }
  .dialog-title {
    line-height: 30px;
    color: #666;
  }
  .img-box {
    height: 92%;
    overflow: hidden;
  }
  .vux-close {
    margin-top: 8px;
    margin-bottom: 8px;
  }
}
</style>