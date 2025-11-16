/*
Theme Name: MyTheme
Theme URI:  https://example.com
Author:     Your Name
Author URI: https://example.com
Description: A minimal custom theme (learning).
Version:    1.0
License:    GPL2
Text Domain: mytheme
*/

/* Basic reset and variables */
:root{
  --primary:#1e73be;
  --text:#222;
  --muted:#666;
  --container:1200px;
}
body{font-family:system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial; color:var(--text); margin:0; line-height:1.6;}
a{color:var(--primary); text-decoration:none;}
.site-container{max-width:var(--container); margin:0 auto; padding:24px;}
.header{background:#fff; border-bottom:1px solid #eee; padding:12px 0;}
.site-title{margin:0; font-size:1.25rem;}
.site-nav{margin-top:8px;}
.hero{background:linear-gradient(90deg, rgba(30,115,190,0.08), rgba(30,115,190,0.02)); padding:48px 0; text-align:center; margin-bottom:24px;}
.hero h1{font-size:2rem; margin:0 0 12px;}
.hero p{color:var(--muted); margin:0 0 18px;}
.button{display:inline-block; padding:12px 20px; background:var(--primary); color:#fff; border-radius:6px;}
.post-list{display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:18px;}
.post-item{border:1px solid #eee; padding:16px; border-radius:8px; background:#fff;}
.post-item h2{margin:0 0 8px; font-size:1.05rem;}
.entry-content{margin-top:16px;}
footer.site-footer{border-top:1px solid #eee; padding:18px 0; margin-top:48px; color:var(--muted); text-align:center;}
