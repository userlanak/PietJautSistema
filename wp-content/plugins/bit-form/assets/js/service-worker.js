if(!self.define){const l=l=>{"require"!==l&&(l+=".js");let s=Promise.resolve();return i[l]||(s=new Promise((async s=>{if("document"in self){const i=document.createElement("script");i.src=l,document.head.appendChild(i),i.onload=s}else importScripts(l),s()}))),s.then((()=>{if(!i[l])throw new Error(`Module ${l} didn’t register its module`);return i[l]}))},s=(s,i)=>{Promise.all(s.map(l)).then((l=>i(1===l.length?l[0]:l)))},i={require:Promise.resolve(s)};self.define=(s,r,n)=>{i[s]||(i[s]=Promise.resolve().then((()=>{let i={};const u={uri:location.origin+s.slice(1)};return Promise.all(r.map((s=>{switch(s){case"exports":return i;case"module":return u;default:return l(s)}}))).then((l=>{const s=n(...l);return i.default||(i.default=s),i}))})))}}define("./service-worker.js",["./workbox-15dd0bab"],(function(l){"use strict";self.skipWaiting(),l.clientsClaim(),l.precacheAndRoute([{url:"../css/1340.css?v=b70c20",revision:null},{url:"../css/3523.css?v=40831b",revision:null},{url:"../css/6367.css?v=18cb5e",revision:null},{url:"../css/9392.css?v=faa533",revision:null},{url:"../css/bitforms.css?v=c1def9",revision:null},{url:"../css/components.css?v=1f5196",revision:null},{url:"../img/bitform-logo-icon.ico",revision:"de30f99aa2651463c67d6e47bd095e13"},{url:"../img/btcd-icn5003ac0f.woff",revision:null},{url:"../img/btcd-icn967a29f2.eot",revision:null},{url:"../img/btcd-icne8bf8c4a.ttf",revision:null},{url:"../img/logo-256.png",revision:"cd08eaf72c1e7a66825b6315b783ac56"},{url:"../img/logo-bg.svg",revision:"6b84383d5820ed9f4b994d40bd410a65"},{url:"../img/logo.svg",revision:"0b5d35a986366a21c753302ea6c552ab"},{url:"1130.js?v=89e06b",revision:null},{url:"1199.js?v=957059",revision:null},{url:"1256.js?v=5c4bc7",revision:null},{url:"1340.js?v=224fee",revision:null},{url:"1527.js?v=1822bb",revision:null},{url:"1538.js?v=945aa7",revision:null},{url:"1754.js?v=b53d8c",revision:null},{url:"1915.js?v=079c68",revision:null},{url:"1946.js?v=51f04f",revision:null},{url:"2005.js?v=f4c51a",revision:null},{url:"2155.js?v=111ab6",revision:null},{url:"2163.js?v=d08db3",revision:null},{url:"2324.js?v=cf43f1",revision:null},{url:"2340.js?v=076bda",revision:null},{url:"246.js?v=6f6fe3",revision:null},{url:"2512.js?v=0a22f9",revision:null},{url:"2627.js?v=4ee8b1",revision:null},{url:"2643.js?v=59149f",revision:null},{url:"2820.js?v=074bd6",revision:null},{url:"3163.js?v=7d387f",revision:null},{url:"3234.js?v=d3ff83",revision:null},{url:"3290.js?v=390be2",revision:null},{url:"3324.js?v=f1074f",revision:null},{url:"345.js?v=a930c4",revision:null},{url:"3523.js?v=9ca8c3",revision:null},{url:"3782.js?v=ce3d73",revision:null},{url:"3793.js?v=1c5b4b",revision:null},{url:"3981.js?v=e258ba",revision:null},{url:"4105.js?v=febc95",revision:null},{url:"4117.js?v=9e84b6",revision:null},{url:"4175.js?v=2f1afa",revision:null},{url:"4282.js?v=9dff4d",revision:null},{url:"4329.js?v=d88bfb",revision:null},{url:"4357.js?v=e065f0",revision:null},{url:"4375.js?v=388a86",revision:null},{url:"4498.js?v=9e4166",revision:null},{url:"4524.js?v=46b6a1",revision:null},{url:"4633.js?v=f84a39",revision:null},{url:"4735.js?v=b43d69",revision:null},{url:"4771.js?v=b69d63",revision:null},{url:"4870.js?v=180951",revision:null},{url:"4872.js?v=09f990",revision:null},{url:"4977.js?v=e4d86f",revision:null},{url:"5071.js?v=ef7b40",revision:null},{url:"5106.js?v=64bfa2",revision:null},{url:"5183.js?v=8cef24",revision:null},{url:"5186.js?v=f10e42",revision:null},{url:"5243.js?v=3e3475",revision:null},{url:"5253.js?v=5df94d",revision:null},{url:"5411.js?v=ea9c3f",revision:null},{url:"5414.js?v=9c8374",revision:null},{url:"5444.js?v=47b033",revision:null},{url:"5537.js?v=e3bc1e",revision:null},{url:"5538.js?v=3f7abb",revision:null},{url:"5569.js?v=254a09",revision:null},{url:"5894.js?v=97ff1b",revision:null},{url:"5988.js?v=957bb5",revision:null},{url:"6101.js?v=55e505",revision:null},{url:"6109.js?v=04f072",revision:null},{url:"6155.js?v=50eda3",revision:null},{url:"6176.js?v=f42129",revision:null},{url:"6179.js?v=97919f",revision:null},{url:"6229.js?v=5f52b5",revision:null},{url:"6274.js?v=2949be",revision:null},{url:"6356.js?v=0cddce",revision:null},{url:"6367.js?v=23f02d",revision:null},{url:"6487.js?v=bf9650",revision:null},{url:"6672.js?v=3d2600",revision:null},{url:"6676.js?v=bf5b04",revision:null},{url:"6750.js?v=3e1ce1",revision:null},{url:"6870.js?v=120b67",revision:null},{url:"6896.js?v=97c758",revision:null},{url:"6904.js?v=d24e52",revision:null},{url:"6930.js?v=41e3c9",revision:null},{url:"6967.js?v=e23e77",revision:null},{url:"6992.js?v=c45fdf",revision:null},{url:"6995.js?v=f19fbb",revision:null},{url:"7060.js?v=41fd7b",revision:null},{url:"7109.js?v=64a2cf",revision:null},{url:"7124.js?v=6657b1",revision:null},{url:"7280.js?v=29d065",revision:null},{url:"7313.js?v=890df2",revision:null},{url:"7376.js?v=28f61f",revision:null},{url:"7426.js?v=b742ce",revision:null},{url:"7525.js?v=365c00",revision:null},{url:"769.js?v=73cb15",revision:null},{url:"7710.js?v=7efebf",revision:null},{url:"7884.js?v=8957ee",revision:null},{url:"7915.js?v=c2bfa6",revision:null},{url:"7923.js?v=f1326f",revision:null},{url:"7958.js?v=46da86",revision:null},{url:"8143.js?v=986729",revision:null},{url:"8199.js?v=d11beb",revision:null},{url:"8236.js?v=af3bcc",revision:null},{url:"8269.js?v=15d820",revision:null},{url:"83.js?v=a4e5a5",revision:null},{url:"8324.js?v=11c3ed",revision:null},{url:"8346.js?v=4ba29a",revision:null},{url:"8461.js?v=adf2a3",revision:null},{url:"851.js?v=348f1c",revision:null},{url:"8627.js?v=1f614c",revision:null},{url:"8646.js?v=59fdc9",revision:null},{url:"8763.js?v=c68dd5",revision:null},{url:"8797.js?v=5860be",revision:null},{url:"8935.js?v=c6435b",revision:null},{url:"9024.js?v=dd7e25",revision:null},{url:"9127.js?v=782367",revision:null},{url:"9264.js?v=176f51",revision:null},{url:"9293.js?v=eb27ba",revision:null},{url:"9304.js?v=9db0f5",revision:null},{url:"9354.js?v=c13839",revision:null},{url:"9392.js?v=e0e26c",revision:null},{url:"9477.js?v=b8bdd6",revision:null},{url:"9487.js?v=72a35b",revision:null},{url:"9519.js?v=d1d5fa",revision:null},{url:"9555.js?v=c23d35",revision:null},{url:"9658.js?v=bd6931",revision:null},{url:"9943.js?v=38fc07",revision:null},{url:"bitforms-file.js",revision:"4dd01c8697c8febaf7a6c75be4e8a2b7"},{url:"bitforms-shortcode-block.js",revision:"97a88d4814afa899dda1358a4ee958d4"},{url:"bitforms.js",revision:"085e8000b244cf721b6b3c00096f02e9"},{url:"components.js",revision:"fe9f802ea262ad48c9a9a0761d2be068"},{url:"index.js",revision:"9f93d8e86ad5aa0d07ce98a4aef16946"},{url:"index.php",revision:"bd111dc0ed29cef5695137d5d1bcdf4f"},{url:"manifest.json",revision:"c5eab41c29a41c261ace9e47c19bfcb2"},{url:"runtime.js",revision:"b804f04350c548dc44835cad580544b9"},{url:"vendors-main.js",revision:"8ca9ce9c3bcfb892fdf99c7bbc7a10ef"}],{})}));
