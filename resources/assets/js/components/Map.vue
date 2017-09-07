<template>
	<div>
		  <!-- <div>
        <img src="img/banner2.jpg" alt="" width="100%">
      </div> -->

	    	

	    	<div style="padding:0 8px;">
					<img class="map-img" v-for="(item, index) in list" :src="item.src" width="100" @click="showImg(index)">
	    	<div v-transfer-dom>
	      		<previewer :list="list" ref="previewer" :options="options"></previewer>
	    	</div>
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
	  </div>

</template>

<script>
	import { Group,Grid, GridItem,Previewer, TransferDom } from 'vux'
	export default {
		directives: {
    			TransferDom
 		 },
		  components: {
		    	Previewer,
		    	Group,
		    	Grid,
		    	GridItem
		  },
		data(){
			return {
				list:[{
				        src: 'img/map.jpg',
				 }],
				 options: {
				        getThumbBoundsFn (index) {
					          let thumbnail = document.querySelectorAll('.map-img')[index]
					          let pageYScroll = window.pageYOffset || document.documentElement.scrollTop
					          let rect = thumbnail.getBoundingClientRect()
					          return {x: rect.left, y: rect.top + pageYScroll, w: rect.width}
					}
				 },
			}
		},
		methods:{
			showImg (index) {
			      	this.$refs.previewer.show(index)
			 }
		}
	}
</script>

<style scoped>
.map-img{
	width:100%;
	padding-top: 5px;
}
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