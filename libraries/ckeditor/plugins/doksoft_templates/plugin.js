(function() {
    function ae() {
        return "ckeditor";
    }

    function d(aj) {
        return aj.elementMode == 3;
    }

    function ad(aj) {
        return aj.name.replace(/\[/, "_").replace(/\]/, "_");
    }

    function ag(aj) {
        return aj.container.$;
    }

    function f(aj) {
        return aj.document.$;
    }

    function s(ak) {
        var aj = ak.getSelection().getStartElement();
        if (aj && aj.$) {
            return aj.$;
        }
    }

    function n() {
        return CKEDITOR.basePath;
    }

    function T() {
        return a("doksoft_templates");
    }

    function a(aj) {
        return CKEDITOR.plugins.getPath(aj);
    }

    function H() {
        return CKEDITOR.version.charAt(0) == "3" ? 3 : 4;
    }

    function S(ak, aj) {
        return ak.lang["doksoft_templates"][aj];
    }

    function u(ak, aj) {
        return J(ak, "doksoft_templates_" + aj);
    }

    function J(ak, aj) {
        var al = ak.config[aj];
        return al;
    }

    function X(aj, ak) {
        af("doksoft_templates_" + aj, ak);
    }

    function af(aj, ak) {
        CKEDITOR.config[aj] = ak;
    }

    function A(al, ak) {
        var aj = CKEDITOR.dom.element.createFromHtml(ak);
        al.insertElement(aj);
    }
    var E = 0;
    var C = null;
    var N = null;
    var e = [];
    var i;
    var w;
    var t;
    var O = "";
    var B = "";
    var aa = "";
    var V = {};
    if (E == 20 || E == 21 || E == 22) {
        X("use_dialog", false);
        X("show_options", true);
        X("show_advanced_options", true);
        if (E == 20) {
            X("default_width_100", false);
        }
        X("default_add_header", false);
        X("default_class", "");
        X("default_style", "");
        if (E == 21) {
            X("default_striped", true);
            X("default_bordered", false);
            X("default_condensed", false);
        }
        e = [];
        var U = "border:1px solid rgb(171, 207, 255);background-color:rgb(195, 217, 255)";
        if (E == 21) {
            U = "border:1px solid #6f5499;background-color:#9174C0";
        } else {
            if (E == 22) {
                U = "border:1px solid #007095;background-color:#008cba";
            }
        }
        for (var q = 0; q < 6; q++) {
            for (var h = 0; h < 6; h++) {
                e.push(['<div id="doksoft_templates_cell_' + h + "_" + q + '_%id%" style="width:20px;height:20px;margin:1px;float:left;' + U + '"></div>', h + "," + q, "table"]);
            }
        }
        O = '<table style="border-width:0px;background-color:transparent;width:%table_width%px">' + "<tbody>" + "<tr>" + '<td style="box-sizing: content-box;width: 154px;vertical-align: top;line-height:0">';
        aa = "</td>" + '<td style="box-sizing: content-box;width:%options_width%px;vertical-align: top;padding-top:6px;padding-left:15px" id="doksoft_templates_options_%id%">' + (E == 20 ? '<div style="height:20px"><label style="font-size:13px;cursor:pointer"><input style="vertical-align:middle;margin:-2px 5px 0 0;cursor:pointer" type="checkbox" id="doksoft_templates_width_100_%id%"/>{{doksoft_table_width_100}}</label></div>' : "") + '<div style="height:20px"><label style="font-size:13px;cursor:pointer"><input type="checkbox" style="vertical-align:middle;margin:-2px 5px 0 0;cursor:pointer" id="doksoft_templates_add_header_%id%"/>{{doksoft_table_add_header}}</label></div>' + (E == 21 ? '<div style="height:20px"><label style="font-size:13px;cursor:pointer"><input type="checkbox" style="vertical-align:middle;margin:-2px 5px 0 0;cursor:pointer" id="doksoft_templates_striped_%id%"/>{{doksoft_bootstrap_table_striped}}</label></div>' + '<div style="height:20px"><label style="font-size:13px;cursor:pointer"><input type="checkbox" style="vertical-align:middle;margin:-2px 5px 0 0;cursor:pointer" id="doksoft_templates_bordered_%id%"/>{{doksoft_bootstrap_table_bordered}}</label></div>' + '<div style="height:20px"><label style="font-size:13px;cursor:pointer"><input type="checkbox" style="vertical-align:middle;margin:-2px 5px 0 0;cursor:pointer" id="doksoft_templates_condensed_%id%"/>{{doksoft_bootstrap_table_condensed}}</label></div>' : "") + '<div id="doksoft_templates_advanced_options_%id%">' + '<div style="height:25px;margin-top:7px"><label style="width:100%;font-size:13px;line-height:24px;white-space:normal">{{doksoft_table_class}}<input style="width:100px;float:right;border:rgb(168, 168, 168) solid 1px;padding:1px 0;margin:2px 0;font-size:13px;cursor:pointer" id="doksoft_templates_class_%id%"/></label></div>' + '<div style="height:25px"><label style="width:100%;font-size:13px;line-height:24px;white-space:normal">{{doksoft_table_style}}<input style="width:100px;float:right;border:rgb(168, 168, 168) solid 1px;padding:1px 0;margin:2px 0;font-size:13px;cursor:pointer" id="doksoft_templates_style_%id%"/></label></div>' + "</div>" + "</td>" + "</tr>" + "</tbody>" + "</table>";
        if (E == 20) {
            V["width_100"] = true;
        }
        V["add_header"] = false;
        V["class"] = "";
        V["style"] = "";
        if (E == 21) {
            V["striped"] = true;
            V["bordered"] = false;
            V["condensed"] = false;
        }
    } else {
        if (E == 3) {
            X("use_dialog", false);
            af("doksoft_templates", []);
            X("popup_width", 400);
            X("dialog_width", 400);
            X("dialog_height", 400);
        } else {
            if (E == 0) {
                X("use_dialog", false);
                i = 360;
                w = 384;
                t = 335;
                                e = [
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/w33w67.png"/>', '<div class="cke_show_border" style="width:100%"><div class="cke_show_border" style="float:left;width:33%"><p>33%</p></div><div class="cke_show_border" style="float:left;width:67%"><p>67%</p></div></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/w50w50.png"/>', '<div class="cke_show_border" style="width:100%"><div class="cke_show_border" style="float:left;width:50%"><p>50%</p></div><div class="cke_show_border" style="float:left;width:50%"><p>50%</p></div></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/w67w33.png"/>', '<div class="cke_show_border" style="width:100%"><div class="cke_show_border" style="float:left;width:67%"><p>67%</p></div><div class="cke_show_border" style="float:left;width:33%"><p>33%</p></div></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/w25w25w50.png"/>', '<div class="cke_show_border" style="width:100%"><div class="cke_show_border" style="float:left;width:25%"><p>25%</p></div><div class="cke_show_border" style="float:left;width:25%"><p>25%</p></div><div class="cke_show_border" style="float:left;width:50%"><p>50%</p></div></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/w25w25w25w25.png"/>', '<div class="cke_show_border" style="width:100%"><div class="cke_show_border" style="float:left;width:25%"><p>25%</p></div><div class="cke_show_border" style="float:left;width:25%"><p>25%</p></div><div class="cke_show_border" style="float:left;width:25%"><p>25%</p></div><div class="cke_show_border" style="float:left;width:25%"><p>25%</p></div></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/w50w25w25.png"/>', '<div class="cke_show_border" style="width:100%"><div class="cke_show_border" style="float:left;width:50%"><p>50%</p></div><div class="cke_show_border" style="float:left;width:25%"><p>25%</p></div><div class="cke_show_border" style="float:left;width:25%"><p>25%</p></div></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/imgl.png"/>', '<div class="cke_show_border" style="width:100%;text-align:left"><p><img src="{path}/img/templates/sample.png" style="float:left;padding:0 20px 20px 0">Text text text</p></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/w25w50w25.png"/>', '<div class="cke_show_border" style="width:100%"><div class="cke_show_border" style="float:left;width:25%"><p>25%</p></div><div class="cke_show_border" style="float:left;width:50%"><p>50%</p></div><div class="cke_show_border" style="float:left;width:25%"><p>25%</p></div></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/imgr.png"/>', '<div class="cke_show_border" style="width:100%;text-align:right"><p>Text text text<img src="{path}/img/templates/sample.png" style="float:right;padding:0 0 20px 20px"></p></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/banded.PNG"/>', '<div class="cke_show_border" style="width:100%"><div class="row"> <div class="large-12 columns"> <img src="http://placehold.it/1000x400&text=[img]"> <hr> </div> </div> <div class="row"> <div class="large-4 columns"> <img src="http://placehold.it/400x300&text=[img]"> </div> <div class="large-8 columns"> <h4>This is a content section.</h4> <div class="row"> <div class="large-6 columns"> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p> </div> <div class="large-6 columns"> <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p> </div> </div> </div> </div> <div class="row"> <div class="large-8 columns"> <h4>This is a content section.</h4> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p> <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p> </div> <div class="large-4 columns"> <img src="http://placehold.it/400x300&text=[img]"> </div> </div></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/blog.PNG"/>', '<div class="cke_show_border" style="width:100%"><div class="row"> <div class="large-9 columns" role="content"> <article> <h3><a href="#">Blog Post Title</a></h3> <h6>Written by <a href="#">John Smith</a> on August 12, 2012.</h6> <div class="row"> <div class="large-6 columns"> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa.</p> <p>Boudin aliqua adipisicing rump corned beef. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p> </div> <div class="large-6 columns"> <img src="http://placehold.it/400x240&text=[img]"/> </div> </div> <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p> <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p> </article> <hr/> <article> <h3><a href="#">Blog Post Title</a></h3> <h6>Written by <a href="#">John Smith</a> on August 12, 2012.</h6> <div class="row"> <div class="large-6 columns"> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa.</p> <p>Boudin aliqua adipisicing rump corned beef. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p> </div> <div class="large-6 columns"> <img src="http://placehold.it/400x240&text=[img]"/> </div> </div> <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p> <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p> </article> </div> <aside class="large-3 columns"> <h5>Categories</h5> <ul class="side-nav"> <li><a href="#">News</a></li> <li><a href="#">Code</a></li> <li><a href="#">Design</a></li> <li><a href="#">Fun</a></li> <li><a href="#">Weasels</a></li> </ul> <div class="panel"> <h5>Featured</h5> <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow.</p> <a href="#">Read More →</a> </div> </aside> </div></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/banner-home.PNG"/>', '<div class="cke_show_border" style="width:100%"> <div class="row"> <div class="large-12 columns"> <ul class="button-group"> <li><a href="#" class="button">Link 1</a></li> <li><a href="#" class="button">Link 2</a></li> <li><a href="#" class="button">Link 3</a></li> <li><a href="#" class="button">Link 4</a></li> <li><a href="#" class="button">Link 5</a></li> <li><a href="#" class="button">Link 6</a></li> <li><a href="#" class="button">Link 7</a></li> </ul> <p><img src="http://placehold.it/1000x400&text=[banner img]"/></p> </div> </div> <div class="row"> <div class="large-8 columns"> <h4>This is a content section.</h4> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p> <p><a href="#" class="secondary small button">Next Page →</a></p> </div> <div class="large-4 columns"> <ul class="small-block-grid-3"> <li><a href="#"><img src="http://placehold.it/120x120"/></a></li> <li><a href="#"><img src="http://placehold.it/120x120"/></a></li> <li><a href="#"><img src="http://placehold.it/120x120"/></a></li> <li><a href="#"><img src="http://placehold.it/120x120"/></a></li> <li><a href="#"><img src="http://placehold.it/120x120"/></a></li> <li><a href="#"><img src="http://placehold.it/120x120"/></a></li> </ul> </div> </div> <div class="row"> <div class="large-12 columns"> <div class="panel"> <h4>Get in touch!</h4> <div class="row"> <div class="large-9 columns"> <p>We\'d love to hear from you, you attractive person you.</p> </div> <div class="large-3 columns"> <a href="#" class="radius button right">Contact Us</a> </div> </div> </div> </div> </div></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/sidebar.PNG"/>', '<div class="cke_show_border" style="width:100%">  <div class="row"> <div class="large-3 columns"> <h1><img src="http://placehold.it/400x100&text=Logo"/></h1> </div> <div class="large-9 columns"> <ul class="inline-list right"> <li><a href="#">Section 1</a></li> <li><a href="#">Section 2</a></li> <li><a href="#">Section 3</a></li> <li><a href="#">Section 4</a></li> </ul> </div> </div> <div class="row"> <div class="large-9 push-3 columns"> <h3>Page Title <small>Page subtitle</small></h3> <p>Bacon ipsum dolor sit amet salami ham hock biltong ball tip drumstick sirloin pancetta meatball short loin. Venison tail chuck pork chop, andouille ball tip beef ribs flank boudin bacon. Salami andouille pork belly short ribs flank cow. Salami sirloin turkey kielbasa. Sausage venison pork loin leberkas chuck short loin, cow ham prosciutto pastrami jowl. Ham hock jerky tri-tip, fatback hamburger shoulder swine pancetta ground round. Tri-tip prosciutto meatball turkey, brisket spare ribs shankle chuck cow chicken ham hock boudin meatloaf jowl.</p> <p>Ground round pastrami pork loin tenderloin jerky. Jerky spare ribs biltong, ham hock ham capicola pork. Jerky turducken pork, meatloaf sausage capicola swine corned beef turkey short loin. Tongue prosciutto pork loin, ground round spare ribs venison kielbasa strip steak.</p> <p>Hamburger bresaola turkey t-bone, leberkas salami pork chop ham hock beef ribs. Rump biltong meatball venison, short ribs pork loin shank shankle corned beef beef. Cow salami jowl short loin hamburger fatback. Short ribs pork belly shoulder pastrami drumstick salami corned beef ham hock bresaola. Swine filet mignon cow sausage ball tip. Cow ribeye ground round, sausage pork loin pig beef ball tip turkey boudin.</p> <p>Prosciutto ball tip filet mignon andouille frankfurter chicken rump sausage meatball. Filet mignon meatloaf ground round andouille ham hock pork. Bresaola short loin meatball chuck hamburger pig. Turkey venison chuck, tongue fatback tail swine jerky corned beef shank kielbasa prosciutto ribeye ham tri-tip. Rump bacon pork belly meatloaf shoulder short loin meatball kielbasa pork loin tongue bresaola brisket corned beef jowl prosciutto. Beef ribs shankle short ribs pork belly corned beef fatback pork chop tongue biltong boudin strip steak sirloin meatloaf pancetta.</p> </div> <div class="large-3 pull-9 columns"> <ul class="side-nav"> <li><a href="#">Section 1</a></li> <li><a href="#">Section 2</a></li> <li><a href="#">Section 3</a></li> <li><a href="#">Section 4</a></li> <li><a href="#">Section 5</a></li> <li><a href="#">Section 6</a></li> </ul> <p><img src="http://placehold.it/320x240&text=Ad"/></p> </div> </div></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/contact.PNG"/>', '<div class="cke_show_border" style="width:100%">  <div class="row"> <div class="large-9 columns"> <h3>Get in Touch!</h3> <p>We\'d love to hear from you. You can either reach out to us as a whole and one of our awesome team members will get back to you, or if you have a specific question reach out to one of our staff. We love getting email all day <em>all day</em>.</p> <div class="section-container tabs" data-section> <section class="section"> <h5 class="title"><a href="#panel1">Contact Our Company</a></h5> <div class="content" data-slug="panel1"> <form> <div class="row collapse"> <div class="large-2 columns"> <label class="inline">Your Name</label> </div> <div class="large-10 columns"> <input type="text" id="yourName" placeholder="Jane Smith"> </div> </div> <div class="row collapse"> <div class="large-2 columns"> <label class="inline"> Your Email</label> </div> <div class="large-10 columns"> <input type="text" id="yourEmail" placeholder="jane@smithco.com"> </div> </div> <label>What\'s up?</label> <textarea rows="4"></textarea> <button type="submit" class="radius button">Submit</button> </form> </div> </section> <section class="section"> <h5 class="title"><a href="#panel2">Specific Person</a></h5> <div class="content" data-slug="panel2"> <ul class="large-block-grid-5"> <li><a href="/cdn-cgi/l/email-protection#d3beb2bf93a0b6a1b6bdbaa7aafdb1b0fda1b6b1"><img src="http://placehold.it/200x200&text=[person]">Mal Reynolds</a></li> <li><a href="/cdn-cgi/l/email-protection#ceb4a1ab8ebdabbcaba0a7bab7e0acade0bcabac"><img src="http://placehold.it/200x200&text=[person]">Zoe Washburne</a></li> <li><a href="/cdn-cgi/l/email-protection#c2a8a3bbaca782b1a7b0a7acabb6bbeca0a1ecb0a7a0"><img src="http://placehold.it/200x200&text=[person]">Jayne Cobb</a></li> <li><a href="/cdn-cgi/l/email-protection#debab1bd9eadbbacbbb0b7aaa7f0bcbdf0acbbbc"><img src="http://placehold.it/200x200&text=[person]">Simon Tam</a></li> <li><a href="/cdn-cgi/l/email-protection#96fdfffafaeff9e3e1ffe2fefbeffbfff8f2d6e5f3e4f3f8ffe2efb8f4f5b8e4f3f4"><img src="http://placehold.it/200x200&text=[person]">River Tam</a></li> <li><a href="/cdn-cgi/l/email-protection#1d71787c7b72736975786a7473795d6e786f7873746964337f7e336f787f"><img src="http://placehold.it/200x200&text=[person]">Hoban Washburne</a></li> <li><a href="/cdn-cgi/l/email-protection#05676a6a6e45766077606b6c717c2b67662b776067"><img src="http://placehold.it/200x200&text=[person]">Shepherd Book</a></li> <li><a href="/cdn-cgi/l/email-protection#6902050c0c291a0c1b0c07001d10470b0a471b0c0b"><img src="http://placehold.it/200x200&text=[person]">Kaywinnet Lee Fry</a></li> <li><a href="/cdn-cgi/l/email-protection#d3babdb2a1b293b4a6babfb7fdb0bcbea3fdb2bfbf"><img src="http://placehold.it/200x200&text=[person]">Inarra Serra</a></li> </ul> </div> </section> </div> </div> <div class="large-3 columns"> <h5>Map</h5> <p> <a href="" data-reveal-id="mapModal"><img src="http://placehold.it/400x280"></a><br/> <a href="" data-reveal-id="mapModal">View Map</a> </p> <p> 123 Awesome St.<br/> Barsoom, MA 95155 </p> </div> </div> <div class="reveal-modal" id="mapModal"> <h4>Where We Are</h4> <p><img src="http://placehold.it/800x600"/></p> <a href="#" class="close-reveal-modal">×</a> </div> </div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/marketing.PNG"/>', '<div class="cke_show_border" style="width:100%">   <div class="row"> <div class="large-12 columns"> <img src="http://placehold.it/1000x400&text=[img]"> <hr> </div> </div> <div class="row"> <div class="large-12 columns show-for-small"> <img src="http://placehold.it/1200x700&text=Mobile Header"> </div> </div><br> <div class="row"> <div class="large-12 columns"> <div class="row"> <div class="large-4 small-6 columns"> <h4>Upcoming Shows</h4><hr> <div class="row"> <div class="large-1 column"> <img src="http://placehold.it/50x50&text=[img]"> </div> <div class="large-9 columns"> <h5><a href="#">Venue Name</a></h5> <h6 class="subheader show-for-small">Doors at 00:00pm</h6> </div> </div><hr> <div class="hide-for-small"> <div class="row"> <div class="large-1 column"> <img src="http://placehold.it/50x50&text=[img]"> </div> <div class="large-9 columns"> <h5 class="subheader"><a href="#">Venue Name</a></h5> </div> </div><hr> <div class="row"> <div class="large-1 column"> <img src="http://placehold.it/50x50&text=[img]"> </div> <div class="large-9 columns"> <h5 class="subheader"><a href="#">Venue Name</a></h5> </div> </div><hr> <div class="row"> <div class="large-1 column"> <img src="http://placehold.it/50x50&text=[img]"> </div> <div class="large-9 columns"> <h5 class="subheader"><a href="#">Venue Name</a></h5> </div> </div> </div> </div> <div class="large-4 small-6 columns"> <img src="http://placehold.it/300x465&text=Image"> </div> <div class="large-4 small-12 columns"> <h4>Blog</h4><hr> <div class="panel"> <h5><a href="#">Post Title 1</a></h5> <h6 class="subheader"> Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Suspendisse ultrices ornare tempor... </h6> <h6><a href="#">Read More »</a></h6> </div> <div class="panel hide-for-small"> <h5><a href="#">Post Title 2 »</a></h5> </div> <div class="panel hide-for-small"> <h5><a href="#">Post Title 3 »</a></h5> </div> <a href="#" class="right">Go To Blog »</a> </div> </div> </div> </div> </div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/realty.PNG"/>', '<div class="cke_show_border" style="width:100%">    <div class="row"> <div class="large-12 columns"> <img src="http://placehold.it/1600x600&text=Header"><br><br> </div> </div> <div class="row"> <div class="large-3 panel columns"> <img src="http://placehold.it/500x500&text=Image"> <h4>Header</h4> <p>Fusce ullamcorper mauris in eros dignissim molestie posuere felis blandit. Aliquam erat volutpat. Mauris ultricies posuere vehicula. Sed sit amet posuere erat. Quisque in ipsum non augue euismod dapibus non et eros.</p><hr> <div class="row"> <div class="large-4 columns"> <a href="#" class="small button">Link</a> </div> <div class="large-4 columns"> <a href="#" class="small button">Link</a> </div> <div class="large-4 columns"> <a href="#" class="small button">Link</a> </div> </div> </div> <div class="large-9 columns"> <div class="panel"> <div class="row"> <div class="large-3 columns"> <img src="http://placehold.it/600x500&text=Thumbnail"> </div> <div class="large-3 columns"> <img src="http://placehold.it/600x500&text=Thumbnail"> </div> <div class="large-3 columns"> <img src="http://placehold.it/600x500&text=Thumbnail"> </div> <div class="large-3 columns"> <img src="http://placehold.it/600x500&text=Thumbnail"> </div> <div class="large-3 columns"> <img src="http://placehold.it/600x500&text=Thumbnail"> </div> <div class="large-3 columns"> <img src="http://placehold.it/600x500&text=Thumbnail"> </div> <div class="large-3 columns"> <img src="http://placehold.it/600x500&text=Thumbnail"> </div> <div class="large-3 columns"> <img src="http://placehold.it/600x500&text=Thumbnail"> </div> <div class="large-3 columns"> <img src="http://placehold.it/600x500&text=Thumbnail"> </div> <div class="large-3 columns"> <img src="http://placehold.it/600x500&text=Thumbnail"> </div> <div class="large-3 columns"> <img src="http://placehold.it/600x500&text=Thumbnail"> </div> <div class="large-3 columns end"> <img src="http://placehold.it/600x500&text=Thumbnail"> </div> </div> </div> <div class="row"> <div class="large-6 columns"> <div class="panel"> <h5>Subheader</h5> <p>Sed sit amet posuere erat. Quisque in ipsum non augue euismod dapibus non et eros.</p> <a href="#" class="small button">Link</a> </div> </div> <div class="large-6 columns"> <div class="panel"> <h5>Subheader</h5> <p>Sed sit amet posuere erat. Quisque in ipsum non augue euismod dapibus non et eros.</p> <a href="#" class="small button">Link</a> </div> </div> </div> </div> </div> </div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/so-boxy.PNG"/>', '<div class="cke_show_border" style="width:100%">     <div class="row"> <div class="large-12 columns"> <ul class="button-group"> <li><a href="#" class="button">Nav Item 1</a></li> <li><a href="#" class="button">Nav Item 2</a></li> <li><a href="#" class="button">Nav Item 3</a></li> </ul> <div class="row"> <div class="large-6 columns"> <img src="http://placehold.it/500x500&text=Image"><br> </div> <div class="large-6 columns"> <h3 class="show-for-small">Header<hr/></h3> <div class="panel"> <h4 class="hide-for-small">Header<hr/></h4> <h5 class="subheader">Fusce ullamcorper mauris in eros dignissim molestie posuere felis blandit. Aliquam erat volutpat. Mauris ultricies posuere vehicula. Sed sit amet posuere erat. Quisque in ipsum non augue euismod dapibus non et eros. Pellentesque consectetur tempus mi iaculis bibendum. Ut vel dolor sed eros tincidunt volutpat ac eget leo.</h5> </div> <div class="row"> <div class="large-6 small-6 columns"> <div class="panel"> <h5>Header</h5> <h6 class="subheader">Praesent placerat dui tincidunt elit suscipit sed.</h6> <a href="#" class="small button">BUTTON TIME!</a> </div> </div> <div class="large-6 small-6 columns"> <div class="panel"> <h5>Header</h5> <h6 class="subheader">Praesent placerat dui tincidunt elit suscipit sed.</h6> <a href="#" class="small button">BUTTON TIME!</a> </div> </div> </div> </div> </div> <div class="row"> <div class="large-12 columns"> <div class="radius panel"> <form> <div class="row collapse"> <div class="large-10 small-8 columns"> <input type="text"/> </div> <div class="large-2 small-3 columns"> <a href="#" class="postfix button expand">Search</a> </div> </div> </form> </div> </div> </div> <div class="row"> <div class="large-12 show-for-small columns"> <h3>Header</h3><hr> </div> <div class="large-3 small-6 columns"> <img src="http://placehold.it/500x500&text=Thumbnail"> <div class="panel"> <p>Description</p> </div> </div> <div class="large-3 small-6 columns"> <img src="http://placehold.it/500x500&text=Thumbnail"> <div class="panel"> <p>Description</p> </div> </div> <div class="large-3 small-6 columns"> <img src="http://placehold.it/500x500&text=Thumbnail"> <div class="panel"> <p>Description</p> </div> </div> <div class="large-3 small-6 columns"> <img src="http://placehold.it/500x500&text=Thumbnail"> <div class="panel"> <p>Description</p> </div> </div> </div> </div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/store.PNG"/>', '<div class="cke_show_border" style="width:100%">      <div class="row"> <div class="large-4 small-12 columns"> <img src="http://placehold.it/500x500&text=Logo"> <div class="hide-for-small panel"> <h3>Header</h3> <h5 class="subheader">Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Donec dignissim nibh fermentum odio ornare sagittis. </h5> </div> <a href="#"> <div class="panel callout radius"> <h6>99 items in your cart</h6> </div> </a> </div> <div class="large-8 columns"> <div class="row"> <div class="large-4 small-6 columns"> <img src="http://placehold.it/1000x1000&text=Thumbnail"> <div class="panel"> <h5>Item Name</h5> <h6 class="subheader">$000.00</h6> </div> </div> <div class="large-4 small-6 columns"> <img src="http://placehold.it/500x500&text=Thumbnail"> <div class="panel"> <h5>Item Name</h5> <h6 class="subheader">$000.00</h6> </div> </div> <div class="large-4 small-6 columns"> <img src="http://placehold.it/500x500&text=Thumbnail"> <div class="panel"> <h5>Item Name</h5> <h6 class="subheader">$000.00</h6> </div> </div> <div class="large-4 small-6 columns"> <img src="http://placehold.it/500x500&text=Thumbnail"> <div class="panel"> <h5>Item Name</h5> <h6 class="subheader">$000.00</h6> </div> </div> <div class="large-4 small-6 columns"> <img src="http://placehold.it/500x500&text=Thumbnail"> <div class="panel"> <h5>Item Name</h5> <h6 class="subheader">$000.00</h6> </div> </div> <div class="large-4 small-6 columns"> <img src="http://placehold.it/500x500&text=Thumbnail"> <div class="panel"> <h5>Item Name</h5> <h6 class="subheader">$000.00</h6> </div> </div> </div> <div class="row"> <div class="large-12 columns"> <div class="panel"> <div class="row"> <div class="large-2 small-6 columns"> <img src="http://placehold.it/300x300&text=Site Owner"> </div> <div class="large-10 small-6 columns"> <strong>This Site Is Managed By<hr/></strong> Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Donec dignissim nibh fermentum odio ornare sagittis </div> </div> </div> </div> </div> </div> </div> </div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/workspace.PNG"/>', '<div class="cke_show_border" style="width:100%">    <div class="row"> <div class="large-12 columns"> <div class="hide-for-small"> <div id="featured"> <img src="http://placehold.it/1000x400&text=Slide Image" alt="slide image"> </div> </div> <div class="row"> <div class="small-12 show-for-small"><br> <img src="http://placehold.it/1000x600&text=For Small Screens"/> </div> </div> </div> </div><br> <div class="row"> <div class="large-12 columns"> <div class="row"> <div class="large-3 small-6 columns"> <img src="http://placehold.it/250x250&text=Thumbnail"/> <h6 class="panel">Description</h6> </div> <div class="large-3 small-6 columns"> <img src="http://placehold.it/250x250&text=Thumbnail"/> <h6 class="panel">Description</h6> </div> <div class="large-3 small-6 columns"> <img src="http://placehold.it/250x250&text=Thumbnail"/> <h6 class="panel">Description</h6> </div> <div class="large-3 small-6 columns"> <img src="http://placehold.it/250x250&text=Thumbnail"/> <h6 class="panel">Description</h6> </div> </div> </div> </div> <div class="row"> <div class="large-12 columns"> <div class="row"> <div class="large-8 columns"> <div class="panel radius"> <div class="row"> <div class="large-6 small-6 columns"> <h4>Header</h4><hr/> <h5 class="subheader">Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Donec dignissim nibh fermentum odio ornare sagittis. </h5> <div class="show-for-small" align="center"> <a href="#" class="small radius button">Call To Action!</a><br> <a href="#" class="small radius button">Call To Action!</a> </div> </div> <div class="large-6 small-6 columns"> <p>Suspendisse ultrices ornare tempor. Aenean eget ultricies libero. Phasellus non ipsum eros. Vivamus at dignissim massa. Aenean dolor libero, blandit quis interdum et, malesuada nec ligula. Nullam erat erat, eleifend sed pulvinar ac. Suspendisse ultrices ornare tempor. Aenean eget ultricies libero. </p> </div> </div> </div> </div> <div class="large-4 columns hide-for-small"> <h4>Get In Touch!</h4><hr/> <a class="large button expand" href="#"> Call To Action! </a> <a class="large button expand" href="#"> Call To Action! </a> </div> </div> </div> </div> </div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/marketing2.PNG"/>', '<div class="cke_show_border" style="width:100%"> <div class="row"> <div class="large-12 column"> <img src="http://placehold.it/1500x400&text=[stuff and img]"> </div> </div> <br> <div class="row"> <div class="medium-3 large-3 text-center columns"> <img src="http://placehold.it/150x150&text=[things]"> <h4>Title of Content</h4> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit.</p> </div> <div class="medium-3 large-3 text-center column"> <img src="http://placehold.it/150x150&text=[things]"> <h4>Title of Content</h4> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit.</p> </div> <div class="medium-3 large-3 text-center column"> <img src="http://placehold.it/150x150&text=[things]"> <h4>Title of Content</h4> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit.</p> </div> <div class="medium-3 large-3 text-center column"> <img src="http://placehold.it/150x150&text=[things]"> <h4>Title of Content</h4> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit.</p> </div> </div> <ul class="example-orbit-content" data-orbit> <li data-orbit-slide="headline-1"> <div class="text-center panel"> <h2>Headline 1</h2> <h3>Subheadline</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos animi, nobis illo. Repellendus atque dolorem, officia recusandae autem, laudantium consectetur, neque!</p> </div> </li> <li data-orbit-slide="headline-2"> <div class="text-center panel"> <h2>Headline 2</h2> <h3>Subheadline</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos animi, nobis illo. Repellendus atque dolorem, officia recusandae autem, laudantium consectetur, neque!</p> </div> </li> <li data-orbit-slide="headline-3"> <div class="text-center panel"> <h2>Headline 3</h2> <h3>Subheadline</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos animi, nobis illo. Repellendus atque dolorem, officia recusandae autem, laudantium consectetur, neque!</p> </div> </li> </ul> <div class="row"> <div class="large-12 columns"> <h2>Secondary Header</h2> </div> </div> <div class="row"> <div class="medium-4 large-4 columns"> <h3>Title of Content</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus illo debitis, enim qui nemo harum perspiciatis inventore, facere omnis neque ipsam.</p> <h3>Title of Content</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus illo debitis, enim qui nemo harum perspiciatis inventore, facere omnis neque ipsam.</p> <h3>Title of Content</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus illo debitis, enim qui nemo harum perspiciatis inventore, facere omnis neque ipsam.</p> </div> <div class="medium-4 large-4 columns"> <h3>Title of Content</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus illo debitis, enim qui nemo harum perspiciatis inventore, facere omnis neque ipsam.</p> <h3>Title of Content</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus illo debitis, enim qui nemo harum perspiciatis inventore, facere omnis neque ipsam.</p> <h3>Title of Content</h3> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus illo debitis, enim qui nemo harum perspiciatis inventore, facere omnis neque ipsam.</p> </div> <div class="medium-4 large-4 columns text-center"> <img src="http://placehold.it/300x500&text=[things]"> </div> </div> <hr> <div class="row"> <div class="large-12 columns"> <h2>Tertiary Header</h2> </div> </div> <div class="row"> <div class="medium-4 large-4 columns text-center"> <img src="http://placehold.it/300x250&text=[things]"> <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dicta hic ut suscipit molestias numquam ab unde nulla repellendus incidunt, magnam reiciendis odio, dolorum labore asperiores odit assumenda ex delectus.</p> </div> <div class="medium-4 large-4 columns text-center"> <img src="http://placehold.it/300x250&text=[things]"> <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dicta hic ut suscipit molestias numquam ab unde nulla repellendus incidunt, magnam reiciendis odio, dolorum labore asperiores odit assumenda ex delectus.</p> </div> <div class="medium-4 large-4 columns text-center"> <img src="http://placehold.it/300x250&text=[things]"> <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dicta hic ut suscipit molestias numquam ab unde nulla repellendus incidunt, magnam reiciendis odio, dolorum labore asperiores odit assumenda ex delectus.</p> </div> </div>  </div></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/product.PNG"/>', '<div class="cke_show_border" style="width:100%">  <div class="row"> <div class="large-3 columns"> <h1><img src="http://placehold.it/400x100&text=Logo"></h1> </div> <div class="large-9 columns right"> <form> <div class="row collapse"> <div class="large-10 small-8 columns"> <input type="text"/> </div> <div class="large-2 small-4 columns"> <a href="#" class="postfix button expand">Search</a> </div> </div> </form> </div> </div> <div class="row"> <hr> <div class="large-2 columns"> <img src="http://placehold.it/400x300&text=[img]"> <br> <img src="http://placehold.it/400x300&text=[img]"> <br> <img src="http://placehold.it/400x300&text=[img]"> <br> <img src="http://placehold.it/400x300&text=[img]"> </div> <div class="large-5 columns"> <img src="http://placehold.it/400x500"> </div> <div class="large-5 columns"> <h4>This is a content section.</h4> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p> <div class="panel"> <h5>Header</h5> <h6 class="subheader">Praesent placerat dui tincidunt elit suscipit sed.</h6> <a href="#" class="small button">Add to Cart</a> </div> </div> </div> <div class="row"> <hr/> <div class="large-6 columns"> <h4>This is a content section.</h4> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p> </div> <div class="large-6 columns"> <h4>This is a content section.</h4> <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p> </div> </div> <div class="row"> <hr> <div class="large-12 columns"> <h4>You might also like:</h4> <img src="http://placehold.it/200x150&text=[img]"> <img src="http://placehold.it/200x150&text=[img]"> <img src="http://placehold.it/200x150&text=[img]"> <img src="http://placehold.it/200x150&text=[img]"> </div> </div></div>', "html"],
                    ['<img style="padding:7px;width:106px;height:76px" src="{path}/img/templates/portfolio.PNG"/>', '<div class="cke_show_border" style="width:100%"> <div class="row"> <div class="large-12 columns"> <img src="http://placehold.it/1000x500&text=[banner img]"> </div> </div> <div class="row"> <hr> <div class="large-8 columns"> <h4>About</h4> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p> <i class="fi-social-twitter"></i> </div> <div class="large-4 columns"> <img src="http://placehold.it/400x300&text=[img]"> </div> </div> <div class="row"> <hr> <div class="large-12 columns"> <h4>Work</h4> <p>Click on each image!</p> <ul class="clearing-thumbs small-block-grid-1 medium-block-grid-2 large-block-grid-4" data-clearing> <li> <a href="http://placehold.it/800x500&text=[img]"> <img data-caption="caption here..." src="http://placehold.it/800x500&text=[img]"></a> </li> <li> <a href="http://placehold.it/800x500&text=[img]"><img data-caption="caption 2 here..." src="http://placehold.it/800x500&text=[img]"></a> </li> <li> <a href="http://placehold.it/800x500&text=[img]"><img data-caption="caption 3 here..." src="http://placehold.it/800x500&text=[img]"></a> </li> <li> <a href="http://placehold.it/800x500&text=[img]"><img data-caption="caption 4 here..." src="http://placehold.it/800x500&text=[img]"></a> </li> <li> <a href="http://placehold.it/800x500&text=[img]"><img data-caption="caption 5 here..." src="http://placehold.it/800x500&text=[img]"></a> </li> <li> <a href="http://placehold.it/800x500&text=[img]"><img data-caption="caption 6 here..." src="http://placehold.it/800x500&text=[img]"></a> </li> </ul> </div> </div> <div class="row"> <div class="large-12 columns"> <hr> <h4>Contact Me</h4> <div class="large-4 columns"> Email: <a class="__cf_email__" href="/cdn-cgi/l/email-protection" data-cfemail="3e535b7e53474e514c4a5851525751105d5153">[email protected]</a><script cf-hash=\'f9e31\' type="text/javascript">/* <![CDATA[ */!function(){try{var t="currentScript"in document?document.currentScript:function(){for(var t=document.getElementsByTagName("script"),e=t.length;e--;)if(t[e].getAttribute("cf-hash"))return t[e]}();if(t&&t.previousSibling){var e,r,n,i,c=t.previousSibling,a=c.getAttribute("data-cfemail");if(a){for(e="",r=parseInt(a.substr(0,2),16),n=2;a.length-n;n+=2)i=parseInt(a.substr(n,2),16)^r,e+=String.fromCharCode(i);e=document.createTextNode(e),c.parentNode.replaceChild(e,c)}}}catch(u){}}();/* ]]> */</script> </div> <div class="large-4 columns"> Twitter: @twitterhandle </div> <div class="large-4 columns"> Phone: 555-555-1234 </div> </div> </div></div>', "html"],
                ];
            
            }
        }
    }

    function v(al) {
        var ak = "-" + ad(al);
        var aj = document.getElementById("doksoft_templates-dialog-root" + ak);
        if (aj != null && aj.children.length == 0) {
            aj.innerHTML = "";
        }
        aj = N.getElementById("doksoft_templates-popup-root" + ak);
        aj.innerHTML = B.replace(/%id%/g, ad(al)).replace(/\{\{([^}]*)\}\}/g, function(an, am) {
            return S(al, am);
        });
        z(al, aj.ownerDocument);
    }

    function P(am) {
        var ak = document.getElementsByClassName("doksoft_templates-selected");
        var al = null;
        for (var aj = 0; aj < ak.length && al == null; aj++) {
            if (Q(ak[aj], "doksoft_templates-template-" + ad(am))) {
                al = ak[aj];
            }
        }
        if (al == null) {
            alert(S(am, "select_element_first"));
            window["doksoft_templates_callback"] = null;
            return false;
        } else {
            y(am, al.getAttribute("data-doksoft_templates_template_id"));
            window["doksoft_templates_callback"] = null;
        }
    }

    function k(ak) {
        var aj;
        if (N != null) {
            aj = N.getElementById("doksoft_templates-popup-root-" + ad(ak));
            if (aj != null && aj.children.length == 0) {
                aj.innerHTMLAddition = null;
            }
        }
        aj = document.getElementById("doksoft_templates-dialog-root-" + ad(ak));
        if (aj.children.length == 0) {
            aj.innerHTML = aj.innerHTML = B.replace(/%id%/g, ad(ak)).replace(/\{\{([^}]*)\}\}/g, function(am, al) {
                return S(ak, al);
            });
        }
        z(ak, aj.ownerDocument);
        I(ak, -1);
    }

    function m(aj) {
        window["doksoft_templates_callback"] = null;
    }

    function M(aj) {
        return window["doksoft_templates_callback"] != null || u(aj, "use_dialog");
    }

    function z(an, ap) {
        if (E == 1) {
            var am = function() {
                V["col-type"] = this.getAttribute("data-col");
            };
            ap.getElementById("doksoft_templatescolTypeXS_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
            ap.getElementById("doksoft_templatescolTypeSM_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
            ap.getElementById("doksoft_templatescolTypeMD_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
            ap.getElementById("doksoft_templatescolTypeLG_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
        } else {
            if (E == 2) {
                var am = function() {
                    V["col-type"] = this.getAttribute("data-col");
                };
                ap.getElementById("doksoft_templatescolTypesmall_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
                ap.getElementById("doksoft_templatescolTypemedium_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
                ap.getElementById("doksoft_templatescolTypelarge_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
            } else {
                if (E == 20 || E == 21 || E == 22) {
                    ap.getElementById("doksoft_templates_add_header_" + ad(an)).checked = u(an, "default_add_header");
                    ap.getElementById("doksoft_templates_add_header_" + ad(an)).onchange = function() {
                        V["add_header"] = this.checked;
                    };
                    if (E == 20) {
                        ap.getElementById("doksoft_templates_width_100_" + ad(an)).checked = u(an, "default_width_100");
                        ap.getElementById("doksoft_templates_width_100_" + ad(an)).onchange = function() {
                            V["width_100"] = this.checked;
                        };
                    }
                    if (E == 21) {
                        ap.getElementById("doksoft_templates_striped_" + ad(an)).checked = u(an, "default_striped");
                        ap.getElementById("doksoft_templates_striped_" + ad(an)).onchange = function() {
                            V["striped"] = this.checked;
                        };
                        ap.getElementById("doksoft_templates_bordered_" + ad(an)).checked = u(an, "default_bordered");
                        ap.getElementById("doksoft_templates_bordered_" + ad(an)).onchange = function() {
                            V["bordered"] = this.checked;
                        };
                        ap.getElementById("doksoft_templates_condensed_" + ad(an)).checked = u(an, "default_condensed");
                        ap.getElementById("doksoft_templates_condensed_" + ad(an)).onchange = function() {
                            V["condensed"] = this.checked;
                        };
                    }
                    ap.getElementById("doksoft_templates_class_" + ad(an)).value = u(an, "default_class");
                    ap.getElementById("doksoft_templates_style_" + ad(an)).value = u(an, "default_style");
                    ap.getElementById("doksoft_templates_options_" + ad(an)).style.display = u(an, "show_options") ? "block" : "none";
                    ap.getElementById("doksoft_templates_advanced_options_" + ad(an)).style.display = u(an, "show_advanced_options") ? "block" : "none";
                    var ao = ap.getElementById("doksoft_templates_class_" + ad(an));
                    ao.onchange = function() {
                        V["class"] = this.value;
                    };
                    ao.oninput = ao.onchange;
                    ao.onpase = ao.onchange;
                    ao.onkeyup = ao.onchange;
                    var al = ap.getElementById("doksoft_templates_style_" + ad(an));
                    al.onchange = function() {
                        V["style"] = this.value;
                    };
                    al.oninput = al.onchange;
                    al.onpase = al.onchange;
                    al.onkeyup = al.onchange;
                }
            }
        }
        var aj = ap.getElementsByClassName("doksoft_templates-template-" + ad(an));
        var aq = function() {
            var ar = this.getAttribute("data-doksoft_templates_template_id");
            M(an) ? I(an, ar) : ai(an, ar);
        };
        for (var ak = 0; ak < aj.length; ak++) {
            aj[ak].onclick = aq;
            if (E == 20 || E == 21 || E == 22) {
                aj[ak].onmouseover = (function() {
                    var ar = ap;
                    return function() {
                        var aw = this.getAttribute("data-doksoft_templates_template_id");
                        var at = aw % 6;
                        var ax = Math.floor(aw / 6);
                        for (var ay = 0; ay < 6; ay++) {
                            for (var au = 0; au < 6; au++) {
                                var av = ar.getElementById("doksoft_templates_cell_" + ay + "_" + au + "_" + ad(an));
                                av.style.opacity = (ay <= at && au <= ax) ? "1" : "0.45";
                            }
                        }
                    };
                })();
            }
        }
    }

    function ac(ak) {
        if (E == 20 || E == 21 || E == 22) {
            if (E == 20) {
                V["width_100"] = u(ak, "default_width_100");
            }
            V["add_header"] = u(ak, "default_add_header");
            if (E == 21) {
                V["striped"] = u(ak, "default_striped");
                V["bordered"] = u(ak, "default_bordered");
                V["condensed"] = u(ak, "default_condensed");
            }
            tableWidth = 154;
            optionsWidth = 0;
            if (u(ak, "show_options") === true) {
                optionsWidth += 100;
                tableWidth += 15;
                if (u(ak, "show_advanced_options") === true) {
                    optionsWidth += 100;
                }
                tableWidth += optionsWidth;
            }
            i = tableWidth + 20;
            w = tableWidth + 40;
            t = 250;
        }
        if (E == 3) {
            e = J(ak, "doksoft_templates");
            i = u(ak, "popup_width");
            w = u(ak, "dialog_width");
            t = u(ak, "dialog_height");
        } else {
            if (E == 0) {} else {
                if (E == 1) {
                    if (["xs", "sm", "md", "xs"].indexOf(u(ak, "default_col_type").toLowerCase()) != -1) {
                        V["col-type"] = u(ak, "default_col_type").toLowerCase();
                    }
                } else {
                    if (E == 2) {
                        if (["small", "medium", "large"].indexOf(u(ak, "default_col_type").toLowerCase()) != -1) {
                            V["col-type"] = u(ak, "default_col_type").toLowerCase();
                        }
                    } else {
                        if (E == 10) {} else {
                            if (E == 11) {} else {
                                if (E == 12) {}
                            }
                        }
                    }
                }
            }
        }
        B = "";
        for (var aj = 0; aj < e.length; aj++) {
            B += '<div data-doksoft_templates_template_id="' + aj + '" class="doksoft_templates-template doksoft_templates-template-%id%">' + e[aj][0].replace(/\{path\}/g, T(ak)) + "</div>";
        }
        if (E == 20 || E == 21 || E == 22) {
            O = O.replace(/%table_width%/g, tableWidth);
            aa = aa.replace(/%options_width%/g, optionsWidth);
        }
        B = '<style type="text/css">' + ".doksoft_templates-template { display: inline-block; }" + ".doksoft_templates-template, .doksoft_templates-template div { cursor:pointer }" + ((E != 20 && E != 21 && E != 22) ? ".doksoft_templates-template:hover, .doksoft_templates-template.doksoft_templates-selected { outline: 1px silver solid; background: #EFEFFF;}" : "") + "</style>" + '<div class="doksoft_templates-panel-%id%" style="white-space: normal">' + B + "</div>";
    }

    function ai(aj, ak) {
        y(aj, ak);
        c(aj);
    }

    function I(al, am) {
        var ak = document.getElementsByClassName("doksoft_templates-template-" + ad(al));
        for (var aj = 0; aj < ak.length; aj++) {
            ak[aj].className = ak[aj].className.replace(/\s*doksoft_templates-selected/, "");
            if (parseInt(ak[aj].getAttribute("data-doksoft_templates_template_id")) == am) {
                ak[aj].className += " doksoft_templates-selected";
            }
        }
    }

    function y(aq, al) {
        var au = null;
        var an = false;
        if (typeof(window["doksoft_templates_callback"]) != "undefined" && window["doksoft_templates_callback"] != null) {
            au = window["doksoft_templates_callback"]["func"];
            an = window["doksoft_templates_callback"]["reverseOrder"];
            window["doksoft_templates_callback"] = null;
        }
        var at = "html";
        var ao = e[al][0].slice(0);
        if (e[al].length > 1) {
            ao = e[al][1].slice(0);
            if (e[al].length > 2) {
                at = e[al][2];
            }
        }
        if (Object.prototype.toString.call(ao) === "[object Array]") {
            for (var am = 0; am < ao.length; am++) {
                ao[am] = ao[am].replace(/\{path\}/g, T());
            }
        } else {
            ao = ao.replace(/\{path\}/g, T());
        }
        if (at == "table" && (E == 20 || E == 21 || E == 22)) {
            var ap = ao.split(",");
            var ak = ap[0];
            var ax = ap[1];
            var aw = [];
            if (E == 21) {
                aw.push("table");
                if (V["striped"]) {
                    aw.push("table-striped");
                }
                if (V["borderd"]) {
                    aw.push("table-bordered");
                }
                if (V["condensed"]) {
                    aw.push("table-condensed");
                }
            }
            if (V["class"].trim().length > 0) {
                aw.push(V["class"].trim());
            }
            if (ae() == "ckeditor") {
                aw.push("cke_show_border");
            }
            var av = V["style"].trim();
            if (E == 20 && V["width_100"]) {
                if (av.length > 0 && av.substr(av.length - 1, 1) != ";") {
                    av += "; ";
                }
                av += "width: 100%";
            }
            ao = "<table" + (aw.length > 0 ? (" class='" + aw.join(" ") + "'") : "") + (av.length > 0 ? (" style='" + av + "'") : "") + ">\n";
            if (V["add_header"]) {
                ao += "\t<thead>\n\t\t<tr>\n";
                for (var am = 0; am <= ak; am++) {
                    ao += "\t\t\t<th>&nbsp;</th>\n";
                }
                ao += "\t\t</tr>\n\t</thead>\n";
            }
            ao += "\t<tbody>\n";
            for (var aj = 0; aj <= ax; aj++) {
                ao += "\t\t<tr>\n";
                for (var ar = 0; ar <= ak; ar++) {
                    ao += "\t\t\t<td>&nbsp;</td>\n";
                }
                ao += "\t\t</tr>\n";
            }
            ao += "\t</tbody>\n";
            ao += "</table>\n";
            A(aq, ao);
        } else {
            if (at == "text") {
                A(aq, "<span>" + ao + "</span>");
            } else {
                if (at == "html") {
                    if (E == 1) {
                        if (V["col-type"] == "sm") {
                            ao = ao.replace(/col-xs/g, "col-sm");
                        } else {
                            if (V["col-type"] == "md") {
                                ao = ao.replace(/col-xs/g, "col-md");
                            } else {
                                if (V["col-type"] == "lg") {
                                    ao = ao.replace(/col-xs/g, "col-lg");
                                }
                            }
                        }
                    } else {
                        if (E == 2) {
                            if (V["col-type"] != "small") {
                                ao = ao.replace(/small/g, V["col-type"]);
                            }
                        }
                    }
                    G(aq, ao, au);
                }
            }
        }
    }

    function G(ak, aj, al) {
        if (typeof(al) == "undefined" || al == null) {
            A(ak, aj);
        } else {
            K(ak, al, aj);
        }
    }

    function R(aj) {
        if (typeof(aj) == "undefined") {
            return "";
        }
        var am = 1000;
        if (aj < am) {
            return aj + " b";
        }
        var ak = ["Kb", "Mb", "Gb", "Tb", "Pb", "Eb", "Zb", "Yb"];
        var al = -1;
        do {
            aj /= am;
            ++al;
        } while (aj >= am);
        return aj.toFixed(1) + " " + ak[al];
    }

    function D(aj) {
        return aj.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
    }

    function Z(aj) {
        var ak = document.createElement("div");
        ak.innerHTML = aj;
        return ak.childNodes;
    }

    function b(aj) {
        return aj.getElementsByTagName("head")[0];
    }

    function j(aj) {
        return aj.getElementsByTagName("body")[0];
    }

    function l(am, ao) {
        if (!am) {
            return;
        }
        var aj = am.getElementsByTagName("link");
        var an = false;
        for (var ak = 0; ak < aj.length; ak++) {
            if (aj[ak].href.indexOf(ao) != -1) {
                an = true;
            }
        }
        if (!an) {
            var al = am.createElement("link");
            al.href = ao;
            al.type = "text/css";
            al.rel = "stylesheet";
            b(am).appendChild(al);
        }
    }

    function W(am, ao) {
        if (!am) {
            return;
        }
        var aj = am.getElementsByTagName("script");
        var an = false;
        for (var al = 0; al < aj.length; al++) {
            if (aj[al].src.indexOf(ao) != -1) {
                an = true;
            }
        }
        if (!an) {
            var ak = am.createElement("script");
            ak.src = ao;
            ak.type = "text/javascript";
            b(am).appendChild(ak);
        }
    }

    function Y(aj, al, ak) {
        l(f(aj), al);
        if (document != f(aj) && ak) {
            l(document, al);
        }
    }

    function ab(aj, al, ak) {
        W(f(aj), al);
        if (document != f(aj) && ak) {
            W(document, al);
        }
    }

    function L(ak, aj) {
        var al = f(ak);
        p(al, aj);
    }

    function p(al, aj) {
        var ak = al.createElement("style");
        b(al).appendChild(ak);
        ak.innerHTML = aj;
    }

    function x(ak, aj) {
        if (Q(ak, aj)) {
            return;
        }
        ak.className = ak.className.length == 0 ? aj : ak.className + " " + aj;
    }

    function o(am, aj) {
        var al = F(am);
        var an = "";
        for (var ak = 0; ak < al.length; ak++) {
            if (an.length > 0) {
                an += " ";
            }
            if (al[ak] != aj) {
                an += al[ak];
            }
        }
        am.className = an;
        am.className = am.className.trim();
    }

    function F(aj) {
        if (typeof(aj.className) === "undefined" || aj.className == null) {
            return [];
        }
        return aj.className.split(/\s+/);
    }

    function Q(am, aj) {
        var al = F(am);
        for (var ak = 0; ak < al.length; ak++) {
            if (al[ak].toLowerCase() == aj.toLowerCase()) {
                return true;
            }
        }
        return false;
    }

    function ah(al, am) {
        var ak = F(al);
        for (var aj = 0; aj < ak.length; aj++) {
            if (ak[aj].indexOf(am) === 0) {
                return true;
            }
        }
        return false;
    }

    function g(al) {
        if (typeof(al.getAttribute("style")) === "undefined" || al.getAttribute("style") == null) {
            return {};
        }
        var an = {};
        var am = al.getAttribute("style").split(/;/);
        for (var ak = 0; ak < am.length; ak++) {
            var ao = am[ak].trim();
            var aj = ao.indexOf(":");
            if (aj > -1) {
                an[ao.substr(0, aj).trim()] = ao.substr(aj + 1);
            } else {
                an[ao] = "";
            }
        }
        return an;
    }

    function r(am, al, aj) {
        var an = g(am);
        for (var ak in an) {
            var ao = an[ak];
            if (ak == al && ao == aj) {
                return true;
            }
        }
        return false;
    }

    function c() {}

    function K(ak, al, aj) {
        CKEDITOR.tools.callFunction(al, aj);
    }
    CKEDITOR.plugins.add("doksoft_templates", {
        requires: "panelbutton,floatpanel",
        lang: "en",
        afterInit: function(ak) {
            ac(ak);
            B = (O + B + aa);
            CKEDITOR.dialog.add("doksoft_templates-" + ad(ak), function(al) {
                return {
                    resizable: 0,
                    width: w,
                    minWidth: w,
                    height: t,
                    maxHeight: t,
                    title: S(al, "doksoft_templates_title"),
                    onShow: function() {
                        k(al);
                    },
                    onOk: function() {
                        P(al);
                    },
                    onCancel: function() {
                        m(al);
                    },
                    contents: [{
                        id: "doksoft_templates-tab-" + ad(al),
                        expand: true,
                        focus: true,
                        elements: [{
                            type: "vbox",
                            padding: 10,
                            children: [{
                                type: "html",
                                html: '<div id="doksoft_templates-dialog-root-' + ad(al) + '" style="white-space: normal"></div>'
                            }]
                        }]
                    }]
                };
            });
            if (M(ak)) {
                var aj = ak.addCommand("doksoft_templates-" + ad(ak), new CKEDITOR.dialogCommand("doksoft_templates-" + ad(ak)));
                if (H() == 3) {
                    ak.ui.addButton("doksoft_templates", {
                        label: S(ak, "doksoft_templates_title"),
                        title: S(ak, "doksoft_templates_title"),
                        icon: this.path + "/icons/doksoft_templates.png",
                        command: "doksoft_templates-" + ad(ak)
                    });
                } else {
                    ak.ui.addButton("doksoft_templates", {
                        label: S(ak, "doksoft_templates_title"),
                        title: S(ak, "doksoft_templates_title"),
                        icon: this.path + "/icons/doksoft_templates_4.png",
                        command: "doksoft_templates-" + ad(ak)
                    });
                }
            } else {
                ak.ui.add("doksoft_templates", CKEDITOR.UI_PANELBUTTON, {
                    icon: this.path + "icons/doksoft_templates" + (H() == 4 ? "_4" : "") + ".png",
                    label: S(ak, "doksoft_templates_title"),
                    command: "doksoft_templates",
                    modes: {
                        wysiwyg: 1
                    },
                    editorFocus: 0,
                    caption: null,
                    table: null,
                    panel: {
                        css: CKEDITOR.skin.getPath("editor"),
                        attributes: {
                            role: "listbox",
                            "aria-label": ""
                        }
                    },
                    onBlock: function(al, an) {
                        an.autoSize = true;
                        an.element.addClass("cke_colorblock");
                        C = al;
                        N = an.element.getDocument().$;
                        var am = new CKEDITOR.dom.element("div");
                        am.$.setAttribute("id", "doksoft_templates-popup-root-" + ad(ak));
                        am.$.setAttribute("style", ((typeof(i) == "undefined" && i != null) ? "" : "width:" + i + "px;") + "padding:10px");
                        an.element.append(am);
                        CKEDITOR.ui.fire("ready", this);
                    },
                    onOpen: function() {
                        v(ak);
                    }
                });
            }
        }
    });
})();