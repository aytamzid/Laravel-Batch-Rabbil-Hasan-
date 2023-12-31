<div class="container mx-auto my-12 lg:px-44">
      <h2 class="text-2xl text-center my-4">FEATURED PRODUCT</h2>

    <div class="tabs my-4  justify-center">
      <a onclick="TabItemClick(1)" id="tabItem1"  class="tab tab-bordered tab-active">NEW ARRIVAL</a>
      <a onclick="TabItemClick(2)" id="tabItem2"  class="tab tab-bordered">SPECIAL</a>
      <a onclick="TabItemClick(3)" id="tabItem3"  class="tab tab-bordered">TRENDING</a>
    </div>

    <div id="FeaturedProduct" class="grid my-8 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

    </div>



</div>


<script>

    FeaturedProductList("new")
    async function FeaturedProductList(remark) {
        let res=await axios.get('/ListProductByRemark/'+remark);
        let FeaturedProduct=$('#FeaturedProduct');
        FeaturedProduct.empty();
        res.data['data'].forEach((element,index) => {
         let item=`<div class="card bg-slate-100 h-auto shadow hover:shadow-xl">
            <figure><img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
            <div class="px-4 pb-6 pt-4">
                <p>MacBook Air M1 8/256GB 13-inch Space Gray</p>
                <p class="card-title my-3">$94000</p>
                <div class="card-actions justify-end">
                    <a href="/product-details?id=${element['id']}" class="btn normal-case btn-sm btn-outline btn-neutral">Buy Now</a>
                </div>
            </div>
        </div>`
           FeaturedProduct.append(item);
     });
 }





 TabItemClick=(id)=>{

  let tabItem1=document.getElementById('tabItem1');
  let tabItem2=document.getElementById('tabItem2');
  let tabItem3=document.getElementById('tabItem3');

  if(id===1){
      FeaturedProductList("new")
    tabItem1.classList.add("tab-active")
    tabItem2.classList.remove("tab-active")
    tabItem3.classList.remove("tab-active")
  }
  else if(id===2){
      FeaturedProductList("special")
    tabItem1.classList.remove("tab-active")
    tabItem2.classList.add("tab-active")
    tabItem3.classList.remove("tab-active")
  }
  else if(id===3){
      FeaturedProductList("trending")
    tabItem1.classList.remove("tab-active")
    tabItem2.classList.remove("tab-active")
    tabItem3.classList.add("tab-active")
  }
}




</script>
