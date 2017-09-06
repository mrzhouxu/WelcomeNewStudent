<template>
  <div style="height: 1000px">

    <group>
      <x-switch v-model="showHideOnBlur" title="1"></x-switch>
    </group>

    

    <div v-transfer-dom>
      <x-dialog v-model="showHideOnBlur" class="dialog-demo" hide-on-blur>
        <div class="img-box">
          <img src="img/banner.jpg" style="max-width:100%">
        </div>
        <div @click="showHideOnBlur=false">
          <span class="vux-close"></span>
        </div>
      </x-dialog>
    </div>

  


  

  </div>
</template>



<script>
import { XDialog, XButton, Group, XSwitch, TransferDomDirective as TransferDom } from 'vux'

export default {
  directives: {
    TransferDom
  },
  components: {
    XDialog,
    XButton,
    Group,
    XSwitch
  },
  methods: {
    doShowToast () {
      this.$vux.toast.show({
        text: 'toast'
      })
    }
  },
  data () {
    return {
      show: false,
      show2: false,
      showToast: false,
      showNoScroll: false,
      showHideOnBlur: false,
      showScrollBox: false,
      showDialogStyle: false
    }
  }
}
</script>

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
    height: 350px;
    overflow: hidden;
  }
  .vux-close {
    margin-top: 8px;
    margin-bottom: 8px;
  }
}
</style>