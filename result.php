<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AI Skin Result - DermaBridgeX</title>

<link href="CSS/result.css" rel="stylesheet">


</head>

<body>
<div class="emoji-bg">
    <span>🧴</span>
    <span>🧼</span>
    <span>✨</span>
    <span>🧴</span>
    <span>🧼</span>
    <span>✨</span>
    <span>🧴</span>
    <span>🧼</span>
</div>

<div class="header">
    DermaBridgeX - Skin Recommendation
</div>

<div class="container">

    <div class="ai-box">
        <h2>Your Smart Skin Report</h2>
        <p id="summary"></p>
    </div>

    <div class="products" id="products"></div>

    <center>
        <a href="skinassessment.php" class="btn">Re-Take Assessment</a>
        <a href="index.php#doctor" class="btn">Consultation</a>
    </center>
    

</div>

<script>

// 🔥 GET DATA
let skinType = localStorage.getItem("skinType") || "oily";
let concern = localStorage.getItem("concern") || "pimples";

// 🔥 BASE PRODUCTS (BY SKIN TYPE)
const baseProducts = {

dry: {
    faceWash: {name:"Cerave Hydrating Facial Cleanser", img:"Images/dryfacewash.jpeg", link:"https://thebrandsshop.com.pk/product/hydrating-facial-cleanser/"},
    serum: {name:"Dermive Hydrating Serum", img:"Images/hydra.png", link:"https://jenpharm.com/collections/skin-care/products/dermive-hydrating-serum?variant=49474185396522"},
    sunscreen: {name:"Hydrating Mineral Sunscreen ", img:"Images/drysunscreen.jpg", link:"https://www.cerave.com/sunscreen/face/hydrating-mineral-sunscreen-face-lotion-spf-50"},
    dayCream: {name:"PONDS CREAM DRY SKIN 111 GM", img:"Images/drycream.jpg", link:"https://alfatah.pk/products/ponds-cream-dry-skin-111-gm?srsltid=AfmBOoqA-ZgC2xwUm-dDKtykDIHgxZeXzPOvKla_F-kpqjJIZFx9rknf"},
    nightCream: {name:"Skin Renewing Night Cream", img:"Images/drynight.jpg", link:"https://www.cerave.com/skincare/moisturizers/skin-renewing-night-cream"}
},

oily: {
    faceWash: {name:"POND'S Lasting Oil Control Face Wash ", img:"Images/oilyfacewash.jpg", link:"https://www.ponds.com/za/p/face-wash-normal-to-oily.html/06001088084184"},
    serum: {name:"The Ordinary Niacinamide 10% + Zinc 1% Serum", img:"Images/oilyserum.jpg", link:"https://ordinarypakistan.pk/product/niacinamide-and-zinc/?srsltid=AfmBOoq_p9tblBsljyljzFg5U6Z4zXNAYkd9MkTxxUMqa4mK9bkNtw2H"},
    sunscreen: {name:"Orior Sunscreen SPF 50++ <br>- 30ml", img:"Images/oilysun.jpg", link:"https://oriorcosmetics.com/products/best-sunblock-in-pakistan"},
    dayCream: {name:"Garnier Even & Matte Oily Skin Face Moisturizer", img:"Images/oilyday.jpg", link:"https://pharmily.co.ke/garnier-even-matte-oily-skin-face-moisturizer-40ml_61"},
    nightCream: {name:"Olim Naturals - Skin Renewing Night Cream ", img:"Images/oilynight.png", link:"https://www.daraz.pk/products/olim-naturals-skin-renewing-night-cream-niacinamide-peptide-complex-and-hyaluronic-acid-moisturizer-for-face-i294262287.html"}
},

combination: {
    faceWash: {name:"Lemon Face Wash ", img:"Images/cominationfacewash.jpg", link:"https://vincecare.com/products/lemon-face-wash"},
    serum: {name:"Maxdif Brightening Serum", img:"Images/combserum.jpg", link:"https://jenpharm.com/collections/skin-care/products/maxdif-brightening-serum?variant=46778972864810"},
    sunscreen: {name:"Hydrating Sheer Sunscreen", img:"Images/combsun.jpg", link:"https://www.cerave.com/sunscreen/hydrating-sheer-sunscreen-broad-spectrum-spf-30-for-face-and-body"},
    dayCream: {name:"NIVEA Mattifying Day Face Cream", img:"Images/combday.jpg", link:"https://www.nivea.co.uk/products/nivea-mattifying-day-face-cream-50ml-40058085726630045.html"},
    nightCream: {name:"Olay Regenerist Night Cream", img:"Images/combnight.jpg", link:"https://www.olay.com/products/regenerist-night-recovery-cream?srsltid=AfmBOoro-Pqd_tke6gsWGZJrZIGhIuT_nO2UWn3L-8t-xWQ6Cud9_HKv"}
},

normal: {
    faceWash: {name:"Maxdif Facewash", img:"Images/normalfacewash.jpg", link:"https://jenpharm.com/collections/skin-care/products/maxdif-skin-brightening-facewash?variant=46770735644970"},
    serum: {name:"Garnier Vitamin C*  Serum", img:"Images/normalserum.jpg", link:"https://www.garnier.co.uk/our-brands/skin-care/vitamin-c/garnier-vitamin-c-brightening-serum"},
    sunscreen: {name:"Spectra Block SPF60", img:"Images/normalsun.png", link:"https://jenpharm.com/collections/skin-care/products/sunblock-spectra-block?variant=46770636751146"},
    dayCream: {name:"Complete Hydrating Cream ", img:"Images/normalday.jpg", link:"https://www.olay.com/en-us/skin-care-products/complete-cream-all-day-moisturizer-spf-15-2oz-jar?srsltid=AfmBOopH5zVouoWH6stvzHobxjq3leinwJmfE3ozwtYoFb2uWN-cg5MJ"},
    nightCream: {name:"L’Oréal Revitalift Night Cream", img:"Images/nightcream.png", link:"https://www.lorealparisusa.com/skin-care/facial-moisturizers/revitalift-anti-wrinkle-firming-night-cream"}
}

};

// 🔥 CONCERN ADJUSTMENTS
const concernAdjustments = {

// pimples: {
//     serum: {name:"Acne Treatment Face Serum 30ml", img:"Images/pimpserum.jpg", link:"https://rivaj-uk.com/products/face-serum-acne-treatment-30ml-1710216?srsltid=AfmBOopOdgf4Ct4nDZHRWJNn0Mfme9RnuYKrcslpwTrJ63COVmKCxcko"},
//     faceWash: {name:"Salicylic Acid Cleanser", img:"https://m.media-amazon.com/images/I/61V1n7vQZDL._SL1500_.jpg", link:"#"}
// },

// dryness: {
//     serum: {name:"Hyaluronic Acid Serum", img:"https://m.media-amazon.com/images/I/61n6V9l0RLL._SL1500_.jpg", link:"#"},
//     dayCream: {name:"Intense Hydration Cream", img:"https://m.media-amazon.com/images/I/61JFC+9uV5L._SL1500_.jpg", link:"#"}
// },

// oiliness: {
//     faceWash: {name:"Oil Control Cleanser", img:"https://m.media-amazon.com/images/I/61V1n7vQZDL._SL1500_.jpg", link:"#"},
//     sunscreen: {name:"Matte Finish SPF 50", img:"https://m.media-amazon.com/images/I/71v9V0K0xYL._SL1500_.jpg", link:"#"}
// },

// "darkspots": {
//     serum: {name:"Vitamin C Brightening Serum", img:"https://m.media-amazon.com/images/I/61n6V9l0RLL._SL1500_.jpg", link:"#"}
// },

// "openpores": {
//     serum: {name:"Pore Minimizing Serum", img:"https://m.media-amazon.com/images/I/51t5E5+0FPL._SL1000_.jpg", link:"#"}
// }

};

// 🔥 MERGE LOGIC
let finalProducts = {...baseProducts[skinType]};

if (concernAdjustments[concern]) {
    Object.assign(finalProducts, concernAdjustments[concern]);
}

// 🔥 SUMMARY
document.getElementById("summary").innerText =
`Your skin type is ${skinType} with concern of ${concern}. 
Here is your personalized skincare routine.`;

// 🔥 DISPLAY
const productList = [
    {title:"Face Wash", data:finalProducts.faceWash},
    {title:"Face Serum", data:finalProducts.serum},
    {title:"Sunscreen", data:finalProducts.sunscreen},
    {title:"Day Cream", data:finalProducts.dayCream},
    {title:"Night Cream", data:finalProducts.nightCream}
];

let container = document.getElementById("products");

productList.forEach(item=>{
    container.innerHTML += `
    <div class="card">
        <img src="${item.data.img}">
        <h3>${item.title}</h3>
        <p>${item.data.name}</p>
        <a href="${item.data.link}" target="_blank" class="buy-btn">Buy Now</a>
    </div>`;
});

</script>

</body>
</html>