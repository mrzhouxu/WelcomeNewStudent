<template>
    <div>
      <div>
        <img src="img/banner2.jpg" alt="" width="100%">
      </div>
      <!-- <p style="text-algin:center;">河南科技学院</p> -->
      <!-- <p class="title">信息工程学院欢迎小石器</p> -->
      <!-- <p class="title">信息工程学院</p> -->
      <!-- <p class="title">欢迎小石器</p> -->
      <div style="padding:0 8px;">
        <group>
          <x-input placeholder="请输入您的身份证号码" text-align="center" v-model="id_card" @on-enter="select"></x-input>
        </group>
        <!-- <x-button type="primary" class="btn">查看自己的大学信息</x-button> -->
        <x-button type="primary" class="btn" @click.native="select">登陆签到</x-button>
        <!-- <p class="support">技术支持：<a>三月软件</a></p> -->
        <group>
          <p class="support">技术支持：<a>三月软件小组</a></p>
          <grid :rows="2" >
            <grid-item label="三月软件公众号" class="item">
              <img slot="icon" src="img/wx.png">
            </grid-item>
            <grid-item label="三月软件招新QQ群" class="item">
              <img slot="icon" src="img/qq_qrcode.jpg">
            </grid-item>
          </grid>
          <p class="join">三月软件期待你的加入</a></p>
        </group>
      </div>
      <loading :show="loading" text="正在登录"></loading>
    </div>
</template>

<script>
import { XInput, Group, XButton,Grid, GridItem,Loading,ToastPlugin  } from 'vux'
Vue.use(ToastPlugin);
export default {
  components: {
    XInput,
    XButton,
    Group,
    Grid, 
    GridItem,
    Loading,
    ToastPlugin
  },
  data () {
    return {
      id_card:'',
      loading:false,
    }
  },
  methods: {
    select(){
      if(!$.trim(this.id_card)){
        this.$vux.toast.show({
          text: 'Loading'
        })
        this.$vux.toast.show({
            text: '请输入您的身份证号码',
            type: 'warn'
        })
        return false;
      }
      var self = this;
      this.loading = true;
      axios.post('/login',{
        id_card:this.id_card
      })
      .then(function(res){
        self.loading = false;
        if(res.data.status == 1){
          self.$router.push({ path: '/info/set/'+res.data.id })
        }else if(res.data.status == 2){
          self.$vux.toast.show({
            text: 'Loading'
          })
          self.$vux.toast.show({
              text: res.data.msg,
              type: 'warn'
          })
          return false;
        }else if(res.data.status == 3){
          self.$router.push({ path: '/info/'+res.data.id })
        }
      })
      .catch(function(error){
          console.log(error)
      });
    }
    
  }
}
</script>
<style>
  body{
    padding: 0;
    margin: 0;
  }
  .item .weui-grid__icon{
    width: 60%;
    height: auto;
    margin: 0 auto;
  }
  a:-webkit-any-link {
        text-decoration: none;
  }

</style>
<style scoped>
  .title{
    text-align:center;
    font-weight: 700;
    text-shadow: 10px 10px 10px rgb(200, 200, 200);
    font-size:26px;
  }
  .btn{
    margin:1.5rem 0;
    font-size:16px;
    padding:4px;
  }
  .support{
    text-align: center;
    font-size: 12px;
    /* padding: 20px 10px 0 0; */
  }
  .join{
    text-align:center;
    font-weight: 700;
    text-shadow: 10px 10px 10px rgb(200, 200, 200);
    font-size:16px;
  }
</style>