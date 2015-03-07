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
        return a("doksoft_foundation_templates");
    }

    function a(aj) {
        return CKEDITOR.plugins.getPath(aj);
    }

    function H() {
        return CKEDITOR.version.charAt(0) == "3" ? 3 : 4;
    }

    function S(ak, aj) {
        return ak.lang["doksoft_foundation_templates"][aj];
    }

    function u(ak, aj) {
        return J(ak, "doksoft_foundation_templates_" + aj);
    }

    function J(ak, aj) {
        var al = ak.config[aj];
        return al;
    }

    function X(aj, ak) {
        af("doksoft_foundation_templates_" + aj, ak);
    }

    function af(aj, ak) {
        CKEDITOR.config[aj] = ak;
    }

    function A(al, ak) {
        var aj = CKEDITOR.dom.element.createFromHtml(ak);
        al.insertElement(aj);
    }
    var E = 2;
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
                e.push(['<div id="doksoft_foundation_templates_cell_' + h + "_" + q + '_%id%" style="width:20px;height:20px;margin:1px;float:left;' + U + '"></div>', h + "," + q, "table"]);
            }
        }
        O = '<table style="border-width:0px;background-color:transparent;width:%table_width%px">' + "<tbody>" + "<tr>" + '<td style="box-sizing: content-box;width: 154px;vertical-align: top;line-height:0">';
        aa = "</td>" + '<td style="box-sizing: content-box;width:%options_width%px;vertical-align: top;padding-top:6px;padding-left:15px" id="doksoft_foundation_templates_options_%id%">' + (E == 20 ? '<div style="height:20px"><label style="font-size:13px;cursor:pointer"><input style="vertical-align:middle;margin:-2px 5px 0 0;cursor:pointer" type="checkbox" id="doksoft_foundation_templates_width_100_%id%"/>{{doksoft_table_width_100}}</label></div>' : "") + '<div style="height:20px"><label style="font-size:13px;cursor:pointer"><input type="checkbox" style="vertical-align:middle;margin:-2px 5px 0 0;cursor:pointer" id="doksoft_foundation_templates_add_header_%id%"/>{{doksoft_table_add_header}}</label></div>' + (E == 21 ? '<div style="height:20px"><label style="font-size:13px;cursor:pointer"><input type="checkbox" style="vertical-align:middle;margin:-2px 5px 0 0;cursor:pointer" id="doksoft_foundation_templates_striped_%id%"/>{{doksoft_bootstrap_table_striped}}</label></div>' + '<div style="height:20px"><label style="font-size:13px;cursor:pointer"><input type="checkbox" style="vertical-align:middle;margin:-2px 5px 0 0;cursor:pointer" id="doksoft_foundation_templates_bordered_%id%"/>{{doksoft_bootstrap_table_bordered}}</label></div>' + '<div style="height:20px"><label style="font-size:13px;cursor:pointer"><input type="checkbox" style="vertical-align:middle;margin:-2px 5px 0 0;cursor:pointer" id="doksoft_foundation_templates_condensed_%id%"/>{{doksoft_bootstrap_table_condensed}}</label></div>' : "") + '<div id="doksoft_foundation_templates_advanced_options_%id%">' + '<div style="height:25px;margin-top:7px"><label style="width:100%;font-size:13px;line-height:24px;white-space:normal">{{doksoft_table_class}}<input style="width:100px;float:right;border:rgb(168, 168, 168) solid 1px;padding:1px 0;margin:2px 0;font-size:13px;cursor:pointer" id="doksoft_foundation_templates_class_%id%"/></label></div>' + '<div style="height:25px"><label style="width:100%;font-size:13px;line-height:24px;white-space:normal">{{doksoft_table_style}}<input style="width:100px;float:right;border:rgb(168, 168, 168) solid 1px;padding:1px 0;margin:2px 0;font-size:13px;cursor:pointer" id="doksoft_foundation_templates_style_%id%"/></label></div>' + "</div>" + "</td>" + "</tr>" + "</tbody>" + "</table>";
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
            af("doksoft_foundation_templates", []);
            X("popup_width", 400);
            X("dialog_width", 400);
            X("dialog_height", 400);
        } else {

                    if (E == 2) {
                        X("use_dialog", false);
                        X("default_col_type", "small");
                        i = 660;
                        w = 675;
                        t = 215;
                        V["col-type"] = "small";
                        O = '<table style="border-width:0px;background-color:transparent;width:100%">' + "<tbody>" + "<tr>" + '<td style="box-sizing: content-box;width: 75px;vertical-align: top;padding-right: 10px;color: #444;">' + '<div style="padding-top: 20px;padding-right: 15px;font-size: 12px;text-align: right">Columns:</div>' + '<div style="margin-top: 17px;padding-top: 46px;padding-right: 15px;font-size: 12px;text-align: right">Rows:</div>' + "</td>" + '<td style="box-sizing: content-box;">';
                        aa = '</td><td style="width:90px;font-size:12px;font-family:Arial;padding-left:20px;line-height:20px;vertical-align:middle">' + '<div style="margin-bottom: 7px;height: 20px;width: 100%;display: inline-block;">Column type:</div><br/>' + '<label style="font-weight:normal;margin-bottom:0;cursor:pointer" id="doksoft_foundation_templatescolTypesmall_label_%id%"><input data-col="small" style="margin-left:10px;" type="radio" ' + (V["col-type"] == "small" ? "checked" : "") + ' name="doksoft_foundation_templates_radio_%id%">&nbsp;Small</label>' + '<label style="font-weight:normal;margin-bottom:0;cursor:pointer" id="doksoft_foundation_templatescolTypemedium_label_%id%"><input data-col="medium" style="margin-left:10px;" type="radio" ' + (V["col-type"] == "medium" ? "checked" : "") + ' name="doksoft_foundation_templates_radio_%id%">&nbsp;Medium</label>' + '<label style="font-weight:normal;margin-bottom:0;cursor:pointer" id="doksoft_foundation_templatescolTypelarge_label_%id%"><input data-col="large" style="margin-left:10px;" type="radio" ' + (V["col-type"] == "large" ? "checked" : "") + ' name="doksoft_foundation_templates_radio_%id%">&nbsp;Large</label>' + "</td></tr></tbody></table>";
                        e = [
                            ['<div style="width:36px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:12px;margin:0 auto;line-height:35px;height:36px;">1</div></div>', '<div class="small-1 columns">col-1</div>', "html"],
                            ['<div style="width:36px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:14px;margin:0 auto;line-height:35px;height:36px;">2</div></div>', '<div class="small-2 columns">col-2</div>', "html"],
                            ['<div style="width:36px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:16px;margin:0 auto;line-height:35px;height:36px;">3</div></div>', '<div class="small-3 columns">col-3</div>', "html"],
                            ['<div style="width:36px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:18px;margin:0 auto;line-height:35px;height:36px;">4</div></div>', '<div class="small-4 columns">col-4</div>', "html"],
                            ['<div style="width:36px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:20px;margin:0 auto;line-height:35px;height:36px;">5</div></div>', '<div class="small-5 columns">col-5</div>', "html"],
                            ['<div style="width:36px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:22px;margin:0 auto;line-height:35px;height:36px;">6</div></div>', '<div class="small-6 columns">col-6</div>', "html"],
                            ['<div style="width:36px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:24px;margin:0 auto;line-height:35px;height:36px;">7</div></div>', '<div class="small-7 columns">col-7</div>', "html"],
                            ['<div style="width:36px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:26px;margin:0 auto;line-height:35px;height:36px;">8</div></div>', '<div class="small-8 columns">col-8</div>', "html"],
                            ['<div style="width:36px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:28px;margin:0 auto;line-height:35px;height:36px;">9</div></div>', '<div class="small-9 columns">col-9</div>', "html"],
                            ['<div style="width:36px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:30px;margin:0 auto;line-height:35px;height:36px;">10</div></div>', '<div class="small-10 columns">col-10</div>', "html"],
                            ['<div style="width:36px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:32px;margin:0 auto;line-height:35px;height:36px;">11</div></div>', '<div class="small-11 columns">col-11</div>', "html"],
                            ['<div style="width:36px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:34px;margin:0 auto;line-height:35px;height:36px;">12</div></div>', '<div class="small-12 columns">col-12</div>', "html"],
                            ['<div style="width:72px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:68px;margin:0 auto;line-height:35px;height:36px;">6 / 6</div></div>', '<div class="row"><div class="small-6 columns">col-6</div><div class="small-6 columns">col-6</div></div>', "html"],
                            ['<div style="width:72px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:68px;margin:0 auto;line-height:35px;height:36px;">4 / 4 / 4</div></div>', '<div class="row"><div class="small-4 columns">col-4</div><div class="small-4 columns">col-4</div><div class="small-4 columns">col-4</div></div>', "html"],
                            ['<div style="width:72px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:68px;margin:0 auto;line-height:35px;height:36px;">3 / 3 / 3 / 3</div></div>', '<div class="row"><div class="small-3 columns">col-3</div><div class="small-3 columns">col-3</div><div class="small-3 columns">col-3</div><div class="small-3 columns">col-3</div></div>', "html"],
                            ['<div style="width:72px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:68px;margin:0 auto;line-height:35px;height:36px;">9 / 3</div></div>', '<div class="row"><div class="small-9 columns">col-9</div><div class="small-3 columns">col-3</div></div>', "html"],
                            ['<div style="width:72px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:68px;margin:0 auto;line-height:35px;height:36px;">3 / 9</div></div>', '<div class="row"><div class="small-3 columns">col-3</div><div class="small-9 columns">col-9</div></div>', "html"],
                            ['<div style="width:72px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:68px;margin:0 auto;line-height:35px;height:36px;">8 / 4</div></div>', '<div class="row"><div class="small-8 columns">col-8</div><div class="small-4 columns">col-4</div></div>', "html"],
                            ['<div style="width:72px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:68px;margin:0 auto;line-height:35px;height:36px;">4 / 8</div></div>', '<div class="row"><div class="small-4 columns">col-4</div><div class="small-8 columns">col-8</div></div>', "html"],
                            ['<div style="width:72px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:68px;margin:0 auto;line-height:35px;height:36px;">7 / 5</div></div>', '<div class="row"><div class="small-7 columns">col-7</div><div class="small-5 columns">col-5</div></div>', "html"],
                            ['<div style="width:72px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:68px;margin:0 auto;line-height:35px;height:36px;">5 / 7</div></div>', '<div class="row"><div class="small-5 columns">col-5</div><div class="col-7 columns">col-7</div></div>', "html"],
                            ['<div style="width:72px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:68px;margin:0 auto;line-height:35px;height:36px;">6 / 3 / 3</div></div>', '<div class="row"><div class="small-6 columns">col-6</div><div class="small-3 columns">col-3</div><div class="small-3 columns">col-3</div></div>', "html"],
                            ['<div style="width:72px;height:36px;margin-bottom:8px;margin-top:8px"><div style="background-color:#008cba;border:#007095 1px solid;text-align:center;font-size:12px;color:white;width:68px;margin:0 auto;line-height:35px;height:36px;">3 / 6 / 3</div></div>', '<div class="row"> <div class="large-12 columns"> <img src="http://placehold.it/1000x400&text=[img]"> <hr></div> </div> <div class="row"> <div class="large-4 columns"> <img src="http://placehold.it/400x300&text=[img]"> </div> <div class="large-8 columns"> <h4>This is a content section.</h4> <div class="row"> <div class="large-6 columns"> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p> </div> <div class="large-6 columns"> <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p> </div> </div> </div> </div> <div class="row"> <div class="large-8 columns"> <h4>This is a content section.</h4> <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p> <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p> </div> <div class="large-4 columns"> <img src="http://placehold.it/400x300&text=[img]"> </div> </div>', "html"],
                        ];
                    } 
                
            
        }
    }

    function v(al) {
        var ak = "-" + ad(al);
        var aj = document.getElementById("doksoft_foundation_templates-dialog-root" + ak);
        if (aj != null && aj.children.length == 0) {
            aj.innerHTML = "";
        }
        aj = N.getElementById("doksoft_foundation_templates-popup-root" + ak);
        aj.innerHTML = B.replace(/%id%/g, ad(al)).replace(/\{\{([^}]*)\}\}/g, function(an, am) {
            return S(al, am);
        });
        z(al, aj.ownerDocument);
    }

    function P(am) {
        var ak = document.getElementsByClassName("doksoft_foundation_templates-selected");
        var al = null;
        for (var aj = 0; aj < ak.length && al == null; aj++) {
            if (Q(ak[aj], "doksoft_foundation_templates-template-" + ad(am))) {
                al = ak[aj];
            }
        }
        if (al == null) {
            alert(S(am, "select_element_first"));
            window["doksoft_foundation_templates_callback"] = null;
            return false;
        } else {
            y(am, al.getAttribute("data-doksoft_foundation_templates_template_id"));
            window["doksoft_foundation_templates_callback"] = null;
        }
    }

    function k(ak) {
        var aj;
        if (N != null) {
            aj = N.getElementById("doksoft_foundation_templates-popup-root-" + ad(ak));
            if (aj != null && aj.children.length == 0) {
                aj.innerHTMLAddition = null;
            }
        }
        aj = document.getElementById("doksoft_foundation_templates-dialog-root-" + ad(ak));
        if (aj.children.length == 0) {
            aj.innerHTML = aj.innerHTML = B.replace(/%id%/g, ad(ak)).replace(/\{\{([^}]*)\}\}/g, function(am, al) {
                return S(ak, al);
            });
        }
        z(ak, aj.ownerDocument);
        I(ak, -1);
    }

    function m(aj) {
        window["doksoft_foundation_templates_callback"] = null;
    }

    function M(aj) {
        return window["doksoft_foundation_templates_callback"] != null || u(aj, "use_dialog");
    }

    function z(an, ap) {
        if (E == 1) {
            var am = function() {
                V["col-type"] = this.getAttribute("data-col");
            };
            ap.getElementById("doksoft_foundation_templatescolTypeXS_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
            ap.getElementById("doksoft_foundation_templatescolTypeSM_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
            ap.getElementById("doksoft_foundation_templatescolTypeMD_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
            ap.getElementById("doksoft_foundation_templatescolTypeLG_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
        } else {
            if (E == 2) {
                var am = function() {
                    V["col-type"] = this.getAttribute("data-col");
                };
                ap.getElementById("doksoft_foundation_templatescolTypesmall_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
                ap.getElementById("doksoft_foundation_templatescolTypemedium_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
                ap.getElementById("doksoft_foundation_templatescolTypelarge_label_" + ad(an)).getElementsByTagName("input")[0].onchange = am;
            } else {
                if (E == 20 || E == 21 || E == 22) {
                    ap.getElementById("doksoft_foundation_templates_add_header_" + ad(an)).checked = u(an, "default_add_header");
                    ap.getElementById("doksoft_foundation_templates_add_header_" + ad(an)).onchange = function() {
                        V["add_header"] = this.checked;
                    };
                    if (E == 20) {
                        ap.getElementById("doksoft_foundation_templates_width_100_" + ad(an)).checked = u(an, "default_width_100");
                        ap.getElementById("doksoft_foundation_templates_width_100_" + ad(an)).onchange = function() {
                            V["width_100"] = this.checked;
                        };
                    }
                    if (E == 21) {
                        ap.getElementById("doksoft_foundation_templates_striped_" + ad(an)).checked = u(an, "default_striped");
                        ap.getElementById("doksoft_foundation_templates_striped_" + ad(an)).onchange = function() {
                            V["striped"] = this.checked;
                        };
                        ap.getElementById("doksoft_foundation_templates_bordered_" + ad(an)).checked = u(an, "default_bordered");
                        ap.getElementById("doksoft_foundation_templates_bordered_" + ad(an)).onchange = function() {
                            V["bordered"] = this.checked;
                        };
                        ap.getElementById("doksoft_foundation_templates_condensed_" + ad(an)).checked = u(an, "default_condensed");
                        ap.getElementById("doksoft_foundation_templates_condensed_" + ad(an)).onchange = function() {
                            V["condensed"] = this.checked;
                        };
                    }
                    ap.getElementById("doksoft_foundation_templates_class_" + ad(an)).value = u(an, "default_class");
                    ap.getElementById("doksoft_foundation_templates_style_" + ad(an)).value = u(an, "default_style");
                    ap.getElementById("doksoft_foundation_templates_options_" + ad(an)).style.display = u(an, "show_options") ? "block" : "none";
                    ap.getElementById("doksoft_foundation_templates_advanced_options_" + ad(an)).style.display = u(an, "show_advanced_options") ? "block" : "none";
                    var ao = ap.getElementById("doksoft_foundation_templates_class_" + ad(an));
                    ao.onchange = function() {
                        V["class"] = this.value;
                    };
                    ao.oninput = ao.onchange;
                    ao.onpase = ao.onchange;
                    ao.onkeyup = ao.onchange;
                    var al = ap.getElementById("doksoft_foundation_templates_style_" + ad(an));
                    al.onchange = function() {
                        V["style"] = this.value;
                    };
                    al.oninput = al.onchange;
                    al.onpase = al.onchange;
                    al.onkeyup = al.onchange;
                }
            }
        }
        var aj = ap.getElementsByClassName("doksoft_foundation_templates-template-" + ad(an));
        var aq = function() {
            var ar = this.getAttribute("data-doksoft_foundation_templates_template_id");
            M(an) ? I(an, ar) : ai(an, ar);
        };
        for (var ak = 0; ak < aj.length; ak++) {
            aj[ak].onclick = aq;
            if (E == 20 || E == 21 || E == 22) {
                aj[ak].onmouseover = (function() {
                    var ar = ap;
                    return function() {
                        var aw = this.getAttribute("data-doksoft_foundation_templates_template_id");
                        var at = aw % 6;
                        var ax = Math.floor(aw / 6);
                        for (var ay = 0; ay < 6; ay++) {
                            for (var au = 0; au < 6; au++) {
                                var av = ar.getElementById("doksoft_foundation_templates_cell_" + ay + "_" + au + "_" + ad(an));
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
            e = J(ak, "doksoft_foundation_templates");
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
            B += '<div data-doksoft_foundation_templates_template_id="' + aj + '" class="doksoft_foundation_templates-template doksoft_foundation_templates-template-%id%">' + e[aj][0].replace(/\{path\}/g, T(ak)) + "</div>";
        }
        if (E == 20 || E == 21 || E == 22) {
            O = O.replace(/%table_width%/g, tableWidth);
            aa = aa.replace(/%options_width%/g, optionsWidth);
        }
        B = '<style type="text/css">' + ".doksoft_foundation_templates-template { display: inline-block; }" + ".doksoft_foundation_templates-template, .doksoft_foundation_templates-template div { cursor:pointer }" + ((E != 20 && E != 21 && E != 22) ? ".doksoft_foundation_templates-template:hover, .doksoft_foundation_templates-template.doksoft_foundation_templates-selected { outline: 1px silver solid; background: #EFEFFF;}" : "") + "</style>" + '<div class="doksoft_foundation_templates-panel-%id%" style="white-space: normal">' + B + "</div>";
    }

    function ai(aj, ak) {
        y(aj, ak);
        c(aj);
    }

    function I(al, am) {
        var ak = document.getElementsByClassName("doksoft_foundation_templates-template-" + ad(al));
        for (var aj = 0; aj < ak.length; aj++) {
            ak[aj].className = ak[aj].className.replace(/\s*doksoft_foundation_templates-selected/, "");
            if (parseInt(ak[aj].getAttribute("data-doksoft_foundation_templates_template_id")) == am) {
                ak[aj].className += " doksoft_foundation_templates-selected";
            }
        }
    }

    function y(aq, al) {
        var au = null;
        var an = false;
        if (typeof(window["doksoft_foundation_templates_callback"]) != "undefined" && window["doksoft_foundation_templates_callback"] != null) {
            au = window["doksoft_foundation_templates_callback"]["func"];
            an = window["doksoft_foundation_templates_callback"]["reverseOrder"];
            window["doksoft_foundation_templates_callback"] = null;
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
    CKEDITOR.plugins.add("doksoft_foundation_templates", {
        requires: "panelbutton,floatpanel",
        lang: "en",
        afterInit: function(ak) {
            ac(ak);
            B = (O + B + aa);
            CKEDITOR.dialog.add("doksoft_foundation_templates-" + ad(ak), function(al) {
                return {
                    resizable: 0,
                    width: w,
                    minWidth: w,
                    height: t,
                    maxHeight: t,
                    title: S(al, "doksoft_foundation_templates_title"),
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
                        id: "doksoft_foundation_templates-tab-" + ad(al),
                        expand: true,
                        focus: true,
                        elements: [{
                            type: "vbox",
                            padding: 10,
                            children: [{
                                type: "html",
                                html: '<div id="doksoft_foundation_templates-dialog-root-' + ad(al) + '" style="white-space: normal"></div>'
                            }]
                        }]
                    }]
                };
            });
            if (M(ak)) {
                var aj = ak.addCommand("doksoft_foundation_templates-" + ad(ak), new CKEDITOR.dialogCommand("doksoft_foundation_templates-" + ad(ak)));
                if (H() == 3) {
                    ak.ui.addButton("doksoft_foundation_templates", {
                        label: S(ak, "doksoft_foundation_templates_title"),
                        title: S(ak, "doksoft_foundation_templates_title"),
                        icon: this.path + "/icons/doksoft_foundation_templates.png",
                        command: "doksoft_foundation_templates-" + ad(ak)
                    });
                } else {
                    ak.ui.addButton("doksoft_foundation_templates", {
                        label: S(ak, "doksoft_foundation_templates_title"),
                        title: S(ak, "doksoft_foundation_templates_title"),
                        icon: this.path + "/icons/doksoft_foundation_templates_4.png",
                        command: "doksoft_foundation_templates-" + ad(ak)
                    });
                }
            } else {
                ak.ui.add("doksoft_foundation_templates", CKEDITOR.UI_PANELBUTTON, {
                    icon: this.path + "icons/doksoft_foundation_templates" + (H() == 4 ? "_4" : "") + ".png",
                    label: S(ak, "doksoft_foundation_templates_title"),
                    command: "doksoft_foundation_templates",
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
                        am.$.setAttribute("id", "doksoft_foundation_templates-popup-root-" + ad(ak));
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