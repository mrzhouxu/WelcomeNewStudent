<template>
    <div class="container">
        <group title="禁用内置验证及显示成功或者错误样式">
      <x-input title="禁用验证" placeholder="I'm placeholder" novalidate :icon-type="iconType" :show-clear="false" @on-blur="onBlur" placeholder-align="right"></x-input>
    </group>
    </div>
</template>

<script>
import { XInput, Group, XButton, Cell } from 'vux'

export default {
  components: {
    XInput,
    XButton,
    Group,
    Cell
  },
  data () {
    return {
      password: '123465',
      password2: '',
      enterText: '',
      valid1: false,
      valid2: false,
      iconType: '',
      be2333: function (value) {
        return {
          valid: value === '2333',
          msg: 'Must be 2333'
        }
      },
      style: '',
      disabledValue: 'hello',
      debounceValue: '',
      maxValue: ''
    }
  },
  methods: {
    getValid1 () {
      this.valid1 = this.$refs.input01.valid
    },
    getValid2 () {
      this.valid2 = this.$refs.input02.valid
    },
    change (val) {
      console.log(val)
    },
    onBlur (val) {
      console.log('on blur', val)
    },
    onFocus (val, $event) {
      console.log('on focus', val, $event)
    },
    onEnter (val) {
      console.log('click enter!', val)
    }
  }
}
</script>