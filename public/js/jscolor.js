!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:r})},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=0)}([function(e,t,n){e.exports=n(1)},function(e,t,n){"use strict";var r,o,i,s,l,a;window.jscolor||(window.jscolor=((a={register:function(){a.attachDOMReadyEvent(a.init),a.attachEvent(document,"mousedown",a.onDocumentMouseDown),a.attachEvent(document,"touchstart",a.onDocumentTouchStart),a.attachEvent(window,"resize",a.onWindowResize)},init:function(){a.jscolor.lookupClass&&a.jscolor.installByClassName(a.jscolor.lookupClass)},tryInstallOnElements:function(e,t){for(var n=new RegExp("(^|\\s)("+t+")(\\s*(\\{[^}]*\\})|\\s|$)","i"),r=0;r<e.length;r+=1){var o;if(void 0===e[r].type||"color"!=e[r].type.toLowerCase()||!a.isColorAttrSupported)if(!e[r].jscolor&&e[r].className&&(o=e[r].className.match(n))){var i=e[r],s=null,l=a.getDataAttr(i,"jscolor");null!==l?s=l:o[4]&&(s=o[4]);var d={};if(s)try{d=new Function("return ("+s+")")()}catch(e){a.warn("Error parsing jscolor options: "+e+":\n"+s)}i.jscolor=new a.jscolor(i,d)}}},isColorAttrSupported:(l=document.createElement("input"),!(!l.setAttribute||(l.setAttribute("type","color"),"color"!=l.type.toLowerCase()))),isCanvasSupported:function(){var e=document.createElement("canvas");return!(!e.getContext||!e.getContext("2d"))}(),fetchElement:function(e){return"string"==typeof e?document.getElementById(e):e},isElementType:function(e,t){return e.nodeName.toLowerCase()===t.toLowerCase()},getDataAttr:function(e,t){var n="data-"+t,r=e.getAttribute(n);return null!==r?r:null},attachEvent:function(e,t,n){e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent&&e.attachEvent("on"+t,n)},detachEvent:function(e,t,n){e.removeEventListener?e.removeEventListener(t,n,!1):e.detachEvent&&e.detachEvent("on"+t,n)},_attachedGroupEvents:{},attachGroupEvent:function(e,t,n,r){a._attachedGroupEvents.hasOwnProperty(e)||(a._attachedGroupEvents[e]=[]),a._attachedGroupEvents[e].push([t,n,r]),a.attachEvent(t,n,r)},detachGroupEvents:function(e){if(a._attachedGroupEvents.hasOwnProperty(e)){for(var t=0;t<a._attachedGroupEvents[e].length;t+=1){var n=a._attachedGroupEvents[e][t];a.detachEvent(n[0],n[1],n[2])}delete a._attachedGroupEvents[e]}},attachDOMReadyEvent:function(e){var t=!1,n=function(){t||(t=!0,e())};if("complete"!==document.readyState){if(document.addEventListener)document.addEventListener("DOMContentLoaded",n,!1),window.addEventListener("load",n,!1);else if(document.attachEvent&&(document.attachEvent("onreadystatechange",function(){"complete"===document.readyState&&(document.detachEvent("onreadystatechange",arguments.callee),n())}),window.attachEvent("onload",n),document.documentElement.doScroll&&window==window.top)){!function e(){if(document.body)try{document.documentElement.doScroll("left"),n()}catch(t){setTimeout(e,1)}}()}}else setTimeout(n,1)},warn:function(e){window.console&&window.console.warn&&window.console.warn(e)},preventDefault:function(e){e.preventDefault&&e.preventDefault(),e.returnValue=!1},captureTarget:function(e){e.setCapture&&(a._capturedTarget=e,a._capturedTarget.setCapture())},releaseTarget:function(){a._capturedTarget&&(a._capturedTarget.releaseCapture(),a._capturedTarget=null)},fireEvent:function(e,t){if(e)if(document.createEvent)(n=document.createEvent("HTMLEvents")).initEvent(t,!0,!0),e.dispatchEvent(n);else if(document.createEventObject){var n=document.createEventObject();e.fireEvent("on"+t,n)}else e["on"+t]&&e["on"+t]()},classNameToList:function(e){return e.replace(/^\s+|\s+$/g,"").split(/\s+/)},hasClass:function(e,t){return!!t&&-1!=(" "+e.className.replace(/\s+/g," ")+" ").indexOf(" "+t+" ")},setClass:function(e,t){for(var n=a.classNameToList(t),r=0;r<n.length;r+=1)a.hasClass(e,n[r])||(e.className+=(e.className?" ":"")+n[r])},unsetClass:function(e,t){for(var n=a.classNameToList(t),r=0;r<n.length;r+=1){var o=new RegExp("^\\s*"+n[r]+"\\s*|\\s*"+n[r]+"\\s*$|\\s+"+n[r]+"(\\s+)","g");e.className=e.className.replace(o,"$1")}},getStyle:function(e){return window.getComputedStyle?window.getComputedStyle(e):e.currentStyle},setStyle:(o=document.createElement("div"),i=function(e){for(var t=0;t<e.length;t+=1)if(e[t]in o.style)return e[t]},s={borderRadius:i(["borderRadius","MozBorderRadius","webkitBorderRadius"]),boxShadow:i(["boxShadow","MozBoxShadow","webkitBoxShadow"])},function(e,t,n){switch(t.toLowerCase()){case"opacity":var r=Math.round(100*parseFloat(n));e.style.opacity=n,e.style.filter="alpha(opacity="+r+")";break;default:e.style[s[t]]=n}}),setBorderRadius:function(e,t){a.setStyle(e,"borderRadius",t||"0")},setBoxShadow:function(e,t){a.setStyle(e,"boxShadow",t||"none")},getElementPos:function(e,t){var n=0,r=0,o=e.getBoundingClientRect();if(n=o.left,r=o.top,!t){var i=a.getViewPos();n+=i[0],r+=i[1]}return[n,r]},getElementSize:function(e){return[e.offsetWidth,e.offsetHeight]},getAbsPointerPos:function(e){e||(e=window.event);var t=0,n=0;return void 0!==e.changedTouches&&e.changedTouches.length?(t=e.changedTouches[0].clientX,n=e.changedTouches[0].clientY):"number"==typeof e.clientX&&(t=e.clientX,n=e.clientY),{x:t,y:n}},getRelPointerPos:function(e){e||(e=window.event);var t=(e.target||e.srcElement).getBoundingClientRect(),n=0,r=0;return void 0!==e.changedTouches&&e.changedTouches.length?(n=e.changedTouches[0].clientX,r=e.changedTouches[0].clientY):"number"==typeof e.clientX&&(n=e.clientX,r=e.clientY),{x:n-t.left,y:r-t.top}},getViewPos:function(){var e=document.documentElement;return[(window.pageXOffset||e.scrollLeft)-(e.clientLeft||0),(window.pageYOffset||e.scrollTop)-(e.clientTop||0)]},getViewSize:function(){var e=document.documentElement;return[window.innerWidth||e.clientWidth,window.innerHeight||e.clientHeight]},redrawPosition:function(){if(a.picker&&a.picker.owner){var e,t,n=a.picker.owner;n.fixed?(e=a.getElementPos(n.targetElement,!0),t=[0,0]):(e=a.getElementPos(n.targetElement),t=a.getViewPos());var r,o,i,s=a.getElementSize(n.targetElement),l=a.getViewSize(),d=a.getPickerOuterDims(n);switch(n.position.toLowerCase()){case"left":r=1,o=0,i=-1;break;case"right":r=1,o=0,i=1;break;case"top":r=0,o=1,i=-1;break;default:r=0,o=1,i=1}var c=(s[o]+d[o])/2;if(n.smartPosition)h=[-t[r]+e[r]+d[r]>l[r]&&-t[r]+e[r]+s[r]/2>l[r]/2&&e[r]+s[r]-d[r]>=0?e[r]+s[r]-d[r]:e[r],-t[o]+e[o]+s[o]+d[o]-c+c*i>l[o]?-t[o]+e[o]+s[o]/2>l[o]/2&&e[o]+s[o]-c-c*i>=0?e[o]+s[o]-c-c*i:e[o]+s[o]-c+c*i:e[o]+s[o]-c+c*i>=0?e[o]+s[o]-c+c*i:e[o]+s[o]-c-c*i];else var h=[e[r],e[o]+s[o]-c+c*i];var p=h[r],u=h[o],m=n.fixed?"fixed":"absolute",v=(h[0]+d[0]>e[0]||h[0]<e[0]+s[0])&&h[1]+d[1]<e[1]+s[1];a._drawPosition(n,p,u,m,v)}},_drawPosition:function(e,t,n,r,o){var i=o?0:e.shadowBlur;a.picker.wrap.style.position=r,a.picker.wrap.style.left=t+"px",a.picker.wrap.style.top=n+"px",a.setBoxShadow(a.picker.boxS,e.shadow?new a.BoxShadow(0,i,e.shadowBlur,0,e.shadowColor):null)},getPickerDims:function(e){var t=!!a.getSliderComponent(e);return[2*e.insetWidth+2*e.padding+e.width+(t?2*e.insetWidth+a.getPadToSliderPadding(e)+e.sliderSize:0),2*e.insetWidth+2*e.padding+e.height+(e.closable?2*e.insetWidth+e.padding+e.buttonHeight:0)]},getPickerOuterDims:function(e){var t=a.getPickerDims(e);return[t[0]+2*e.borderWidth,t[1]+2*e.borderWidth]},getPadToSliderPadding:function(e){return Math.max(e.padding,1.5*(2*e.pointerBorderWidth+e.pointerThickness))},getPadYComponent:function(e){switch(e.mode.charAt(1).toLowerCase()){case"v":return"v"}return"s"},getSliderComponent:function(e){if(e.mode.length>2)switch(e.mode.charAt(2).toLowerCase()){case"s":return"s";case"v":return"v"}return null},onDocumentMouseDown:function(e){e||(e=window.event);var t=e.target||e.srcElement;t._jscLinkedInstance?t._jscLinkedInstance.showOnClick&&t._jscLinkedInstance.show():t._jscControlName?a.onControlPointerStart(e,t,t._jscControlName,"mouse"):a.picker&&a.picker.owner&&a.picker.owner.hide()},onDocumentTouchStart:function(e){e||(e=window.event);var t=e.target||e.srcElement;t._jscLinkedInstance?t._jscLinkedInstance.showOnClick&&t._jscLinkedInstance.show():t._jscControlName?a.onControlPointerStart(e,t,t._jscControlName,"touch"):a.picker&&a.picker.owner&&a.picker.owner.hide()},onWindowResize:function(e){a.redrawPosition()},onParentScroll:function(e){a.picker&&a.picker.owner&&a.picker.owner.hide()},_pointerMoveEvent:{mouse:"mousemove",touch:"touchmove"},_pointerEndEvent:{mouse:"mouseup",touch:"touchend"},_pointerOrigin:null,_capturedTarget:null,onControlPointerStart:function(e,t,n,r){var o=t._jscInstance;a.preventDefault(e),a.captureTarget(t);var i=function(o,i){a.attachGroupEvent("drag",o,a._pointerMoveEvent[r],a.onDocumentPointerMove(e,t,n,r,i)),a.attachGroupEvent("drag",o,a._pointerEndEvent[r],a.onDocumentPointerEnd(e,t,n,r))};if(i(document,[0,0]),window.parent&&window.frameElement){var s=window.frameElement.getBoundingClientRect(),l=[-s.left,-s.top];i(window.parent.window.document,l)}var d=a.getAbsPointerPos(e),c=a.getRelPointerPos(e);switch(a._pointerOrigin={x:d.x-c.x,y:d.y-c.y},n){case"pad":switch(a.getSliderComponent(o)){case"s":0===o.hsv[1]&&o.fromHSV(null,100,null);break;case"v":0===o.hsv[2]&&o.fromHSV(null,null,100)}a.setPad(o,e,0,0);break;case"sld":a.setSld(o,e,0)}a.dispatchFineChange(o)},onDocumentPointerMove:function(e,t,n,r,o){return function(e){var r=t._jscInstance;switch(n){case"pad":e||(e=window.event),a.setPad(r,e,o[0],o[1]),a.dispatchFineChange(r);break;case"sld":e||(e=window.event),a.setSld(r,e,o[1]),a.dispatchFineChange(r)}}},onDocumentPointerEnd:function(e,t,n,r){return function(e){var n=t._jscInstance;a.detachGroupEvents("drag"),a.releaseTarget(),a.dispatchChange(n)}},dispatchChange:function(e){e.valueElement&&a.isElementType(e.valueElement,"input")&&a.fireEvent(e.valueElement,"change")},dispatchFineChange:function(e){e.onFineChange&&("string"==typeof e.onFineChange?new Function(e.onFineChange):e.onFineChange).call(e)},setPad:function(e,t,n,r){var o=a.getAbsPointerPos(t),i=n+o.x-a._pointerOrigin.x-e.padding-e.insetWidth,s=r+o.y-a._pointerOrigin.y-e.padding-e.insetWidth,l=i*(360/(e.width-1)),d=100-s*(100/(e.height-1));switch(a.getPadYComponent(e)){case"s":e.fromHSV(l,d,null,a.leaveSld);break;case"v":e.fromHSV(l,null,d,a.leaveSld)}},setSld:function(e,t,n){var r=100-(n+a.getAbsPointerPos(t).y-a._pointerOrigin.y-e.padding-e.insetWidth)*(100/(e.height-1));switch(a.getSliderComponent(e)){case"s":e.fromHSV(null,r,null,a.leavePad);break;case"v":e.fromHSV(null,null,r,a.leavePad)}},_vmlNS:"jsc_vml_",_vmlCSS:"jsc_vml_css_",_vmlReady:!1,initVML:function(){if(!a._vmlReady){var e=document;if(e.namespaces[a._vmlNS]||e.namespaces.add(a._vmlNS,"urn:schemas-microsoft-com:vml"),!e.styleSheets[a._vmlCSS]){var t=["shape","shapetype","group","background","path","formulas","handles","fill","stroke","shadow","textbox","textpath","imagedata","line","polyline","curve","rect","roundrect","oval","arc","image"],n=e.createStyleSheet();n.owningElement.id=a._vmlCSS;for(var r=0;r<t.length;r+=1)n.addRule(a._vmlNS+"\\:"+t[r],"behavior:url(#default#VML);")}a._vmlReady=!0}},createPalette:function(){var e={elm:null,draw:null};if(a.isCanvasSupported){var t=document.createElement("canvas"),n=t.getContext("2d"),r=function(e,r,o){t.width=e,t.height=r,n.clearRect(0,0,t.width,t.height);var i=n.createLinearGradient(0,0,t.width,0);i.addColorStop(0,"#F00"),i.addColorStop(1/6,"#FF0"),i.addColorStop(2/6,"#0F0"),i.addColorStop(.5,"#0FF"),i.addColorStop(4/6,"#00F"),i.addColorStop(5/6,"#F0F"),i.addColorStop(1,"#F00"),n.fillStyle=i,n.fillRect(0,0,t.width,t.height);var s=n.createLinearGradient(0,0,0,t.height);switch(o.toLowerCase()){case"s":s.addColorStop(0,"rgba(255,255,255,0)"),s.addColorStop(1,"rgba(255,255,255,1)");break;case"v":s.addColorStop(0,"rgba(0,0,0,0)"),s.addColorStop(1,"rgba(0,0,0,1)")}n.fillStyle=s,n.fillRect(0,0,t.width,t.height)};e.elm=t,e.draw=r}else{a.initVML();var o=document.createElement("div");o.style.position="relative",o.style.overflow="hidden";var i=document.createElement(a._vmlNS+":fill");i.type="gradient",i.method="linear",i.angle="90",i.colors="16.67% #F0F, 33.33% #00F, 50% #0FF, 66.67% #0F0, 83.33% #FF0";var s=document.createElement(a._vmlNS+":rect");s.style.position="absolute",s.style.left="-1px",s.style.top="-1px",s.stroked=!1,s.appendChild(i),o.appendChild(s);var l=document.createElement(a._vmlNS+":fill");l.type="gradient",l.method="linear",l.angle="180",l.opacity="0";var d=document.createElement(a._vmlNS+":rect");d.style.position="absolute",d.style.left="-1px",d.style.top="-1px",d.stroked=!1,d.appendChild(l),o.appendChild(d);r=function(e,t,n){switch(o.style.width=e+"px",o.style.height=t+"px",s.style.width=d.style.width=e+1+"px",s.style.height=d.style.height=t+1+"px",i.color="#F00",i.color2="#F00",n.toLowerCase()){case"s":l.color=l.color2="#FFF";break;case"v":l.color=l.color2="#000"}};e.elm=o,e.draw=r}return e},createSliderGradient:function(){var e={elm:null,draw:null};if(a.isCanvasSupported){var t=document.createElement("canvas"),n=t.getContext("2d"),r=function(e,r,o,i){t.width=e,t.height=r,n.clearRect(0,0,t.width,t.height);var s=n.createLinearGradient(0,0,0,t.height);s.addColorStop(0,o),s.addColorStop(1,i),n.fillStyle=s,n.fillRect(0,0,t.width,t.height)};e.elm=t,e.draw=r}else{a.initVML();var o=document.createElement("div");o.style.position="relative",o.style.overflow="hidden";var i=document.createElement(a._vmlNS+":fill");i.type="gradient",i.method="linear",i.angle="180";var s=document.createElement(a._vmlNS+":rect");s.style.position="absolute",s.style.left="-1px",s.style.top="-1px",s.stroked=!1,s.appendChild(i),o.appendChild(s);r=function(e,t,n,r){o.style.width=e+"px",o.style.height=t+"px",s.style.width=e+1+"px",s.style.height=t+1+"px",i.color=n,i.color2=r};e.elm=o,e.draw=r}return e},leaveValue:1,leaveStyle:2,leavePad:4,leaveSld:8,BoxShadow:(r=function(e,t,n,r,o,i){this.hShadow=e,this.vShadow=t,this.blur=n,this.spread=r,this.color=o,this.inset=!!i},r.prototype.toString=function(){var e=[Math.round(this.hShadow)+"px",Math.round(this.vShadow)+"px",Math.round(this.blur)+"px",Math.round(this.spread)+"px",this.color];return this.inset&&e.push("inset"),e.join(" ")},r),jscolor:function(e,t){for(var n in this.value=null,this.valueElement=e,this.styleElement=e,this.required=!0,this.refine=!0,this.hash=!1,this.uppercase=!0,this.onFineChange=null,this.activeClass="jscolor-active",this.overwriteImportant=!1,this.minS=0,this.maxS=100,this.minV=0,this.maxV=100,this.hsv=[0,0,100],this.rgb=[255,255,255],this.width=181,this.height=101,this.showOnClick=!0,this.mode="HSV",this.position="bottom",this.smartPosition=!0,this.sliderSize=16,this.crossSize=8,this.closable=!1,this.closeText="Close",this.buttonColor="#000000",this.buttonHeight=18,this.padding=12,this.backgroundColor="#FFFFFF",this.borderWidth=1,this.borderColor="#BBBBBB",this.borderRadius=8,this.insetWidth=1,this.insetColor="#BBBBBB",this.shadow=!0,this.shadowBlur=15,this.shadowColor="rgba(0,0,0,0.2)",this.pointerColor="#4C4C4C",this.pointerBorderColor="#FFFFFF",this.pointerBorderWidth=1,this.pointerThickness=2,this.zIndex=1e3,this.container=null,t)t.hasOwnProperty(n)&&(this[n]=t[n]);function r(e,t,n){var r=n/100*255;if(null===e)return[r,r,r];e/=60,t/=100;var o=Math.floor(e),i=r*(1-t),s=r*(1-t*(o%2?e-o:1-(e-o)));switch(o){case 6:case 0:return[r,s,i];case 1:return[s,r,i];case 2:return[i,r,s];case 3:return[i,s,r];case 4:return[s,i,r];case 5:return[r,i,s]}}function o(){h._processParentElementsInDOM(),a.picker||(a.picker={owner:null,wrap:document.createElement("div"),box:document.createElement("div"),boxS:document.createElement("div"),boxB:document.createElement("div"),pad:document.createElement("div"),padB:document.createElement("div"),padM:document.createElement("div"),padPal:a.createPalette(),cross:document.createElement("div"),crossBY:document.createElement("div"),crossBX:document.createElement("div"),crossLY:document.createElement("div"),crossLX:document.createElement("div"),sld:document.createElement("div"),sldB:document.createElement("div"),sldM:document.createElement("div"),sldGrad:a.createSliderGradient(),sldPtrS:document.createElement("div"),sldPtrIB:document.createElement("div"),sldPtrMB:document.createElement("div"),sldPtrOB:document.createElement("div"),btn:document.createElement("div"),btnT:document.createElement("span")},a.picker.pad.appendChild(a.picker.padPal.elm),a.picker.padB.appendChild(a.picker.pad),a.picker.cross.appendChild(a.picker.crossBY),a.picker.cross.appendChild(a.picker.crossBX),a.picker.cross.appendChild(a.picker.crossLY),a.picker.cross.appendChild(a.picker.crossLX),a.picker.padB.appendChild(a.picker.cross),a.picker.box.appendChild(a.picker.padB),a.picker.box.appendChild(a.picker.padM),a.picker.sld.appendChild(a.picker.sldGrad.elm),a.picker.sldB.appendChild(a.picker.sld),a.picker.sldB.appendChild(a.picker.sldPtrOB),a.picker.sldPtrOB.appendChild(a.picker.sldPtrMB),a.picker.sldPtrMB.appendChild(a.picker.sldPtrIB),a.picker.sldPtrIB.appendChild(a.picker.sldPtrS),a.picker.box.appendChild(a.picker.sldB),a.picker.box.appendChild(a.picker.sldM),a.picker.btn.appendChild(a.picker.btnT),a.picker.box.appendChild(a.picker.btn),a.picker.boxB.appendChild(a.picker.box),a.picker.wrap.appendChild(a.picker.boxS),a.picker.wrap.appendChild(a.picker.boxB));var e,t,n=a.picker,r=!!a.getSliderComponent(h),o=a.getPickerDims(h),l=2*h.pointerBorderWidth+h.pointerThickness+2*h.crossSize,d=a.getPadToSliderPadding(h),c=Math.min(h.borderRadius,Math.round(h.padding*Math.PI));n.wrap.style.clear="both",n.wrap.style.width=o[0]+2*h.borderWidth+"px",n.wrap.style.height=o[1]+2*h.borderWidth+"px",n.wrap.style.zIndex=h.zIndex,n.box.style.width=o[0]+"px",n.box.style.height=o[1]+"px",n.boxS.style.position="absolute",n.boxS.style.left="0",n.boxS.style.top="0",n.boxS.style.width="100%",n.boxS.style.height="100%",a.setBorderRadius(n.boxS,c+"px"),n.boxB.style.position="relative",n.boxB.style.border=h.borderWidth+"px solid",n.boxB.style.borderColor=h.borderColor,n.boxB.style.background=h.backgroundColor,a.setBorderRadius(n.boxB,c+"px"),n.padM.style.background=n.sldM.style.background="#FFF",a.setStyle(n.padM,"opacity","0"),a.setStyle(n.sldM,"opacity","0"),n.pad.style.position="relative",n.pad.style.width=h.width+"px",n.pad.style.height=h.height+"px",n.padPal.draw(h.width,h.height,a.getPadYComponent(h)),n.padB.style.position="absolute",n.padB.style.left=h.padding+"px",n.padB.style.top=h.padding+"px",n.padB.style.border=h.insetWidth+"px solid",n.padB.style.borderColor=h.insetColor,n.padM._jscInstance=h,n.padM._jscControlName="pad",n.padM.style.position="absolute",n.padM.style.left="0",n.padM.style.top="0",n.padM.style.width=h.padding+2*h.insetWidth+h.width+d/2+"px",n.padM.style.height=o[1]+"px",n.padM.style.cursor="crosshair",n.cross.style.position="absolute",n.cross.style.left=n.cross.style.top="0",n.cross.style.width=n.cross.style.height=l+"px",n.crossBY.style.position=n.crossBX.style.position="absolute",n.crossBY.style.background=n.crossBX.style.background=h.pointerBorderColor,n.crossBY.style.width=n.crossBX.style.height=2*h.pointerBorderWidth+h.pointerThickness+"px",n.crossBY.style.height=n.crossBX.style.width=l+"px",n.crossBY.style.left=n.crossBX.style.top=Math.floor(l/2)-Math.floor(h.pointerThickness/2)-h.pointerBorderWidth+"px",n.crossBY.style.top=n.crossBX.style.left="0",n.crossLY.style.position=n.crossLX.style.position="absolute",n.crossLY.style.background=n.crossLX.style.background=h.pointerColor,n.crossLY.style.height=n.crossLX.style.width=l-2*h.pointerBorderWidth+"px",n.crossLY.style.width=n.crossLX.style.height=h.pointerThickness+"px",n.crossLY.style.left=n.crossLX.style.top=Math.floor(l/2)-Math.floor(h.pointerThickness/2)+"px",n.crossLY.style.top=n.crossLX.style.left=h.pointerBorderWidth+"px",n.sld.style.overflow="hidden",n.sld.style.width=h.sliderSize+"px",n.sld.style.height=h.height+"px",n.sldGrad.draw(h.sliderSize,h.height,"#000","#000"),n.sldB.style.display=r?"block":"none",n.sldB.style.position="absolute",n.sldB.style.right=h.padding+"px",n.sldB.style.top=h.padding+"px",n.sldB.style.border=h.insetWidth+"px solid",n.sldB.style.borderColor=h.insetColor,n.sldM._jscInstance=h,n.sldM._jscControlName="sld",n.sldM.style.display=r?"block":"none",n.sldM.style.position="absolute",n.sldM.style.right="0",n.sldM.style.top="0",n.sldM.style.width=h.sliderSize+d/2+h.padding+2*h.insetWidth+"px",n.sldM.style.height=o[1]+"px",n.sldM.style.cursor="default",n.sldPtrIB.style.border=n.sldPtrOB.style.border=h.pointerBorderWidth+"px solid "+h.pointerBorderColor,n.sldPtrOB.style.position="absolute",n.sldPtrOB.style.left=-(2*h.pointerBorderWidth+h.pointerThickness)+"px",n.sldPtrOB.style.top="0",n.sldPtrMB.style.border=h.pointerThickness+"px solid "+h.pointerColor,n.sldPtrS.style.width=h.sliderSize+"px",n.sldPtrS.style.height=u+"px",n.btn.style.display=h.closable?"block":"none",n.btn.style.position="absolute",n.btn.style.left=h.padding+"px",n.btn.style.bottom=h.padding+"px",n.btn.style.padding="0 15px",n.btn.style.height=h.buttonHeight+"px",n.btn.style.border=h.insetWidth+"px solid",e=h.insetColor.split(/\s+/),t=e.length<2?e[0]:e[1]+" "+e[0]+" "+e[0]+" "+e[1],n.btn.style.borderColor=t,n.btn.style.color=h.buttonColor,n.btn.style.font="12px sans-serif",n.btn.style.textAlign="center";try{n.btn.style.cursor="pointer"}catch(e){n.btn.style.cursor="hand"}n.btn.onmousedown=function(){h.hide()},n.btnT.style.lineHeight=h.buttonHeight+"px",n.btnT.innerHTML="",n.btnT.appendChild(document.createTextNode(h.closeText)),i(),s(),a.picker.owner&&a.picker.owner!==h&&a.unsetClass(a.picker.owner.targetElement,h.activeClass),a.picker.owner=h,a.isElementType(p,"body")?a.redrawPosition():a._drawPosition(h,0,0,"relative",!1),n.wrap.parentNode!=p&&p.appendChild(n.wrap),a.setClass(h.targetElement,h.activeClass)}function i(){switch(a.getPadYComponent(h)){case"s":var e=1;break;case"v":e=2}var t=Math.round(h.hsv[0]/360*(h.width-1)),n=Math.round((1-h.hsv[e]/100)*(h.height-1)),o=2*h.pointerBorderWidth+h.pointerThickness+2*h.crossSize,i=-Math.floor(o/2);switch(a.picker.cross.style.left=t+i+"px",a.picker.cross.style.top=n+i+"px",a.getSliderComponent(h)){case"s":var s=r(h.hsv[0],100,h.hsv[2]),l=r(h.hsv[0],0,h.hsv[2]),d="rgb("+Math.round(s[0])+","+Math.round(s[1])+","+Math.round(s[2])+")",c="rgb("+Math.round(l[0])+","+Math.round(l[1])+","+Math.round(l[2])+")";a.picker.sldGrad.draw(h.sliderSize,h.height,d,c);break;case"v":var p=r(h.hsv[0],h.hsv[1],100);d="rgb("+Math.round(p[0])+","+Math.round(p[1])+","+Math.round(p[2])+")",c="#000";a.picker.sldGrad.draw(h.sliderSize,h.height,d,c)}}function s(){var e=a.getSliderComponent(h);if(e){switch(e){case"s":var t=1;break;case"v":t=2}var n=Math.round((1-h.hsv[t]/100)*(h.height-1));a.picker.sldPtrOB.style.top=n-(2*h.pointerBorderWidth+h.pointerThickness)-Math.floor(u/2)+"px"}}function l(){return a.picker&&a.picker.owner===h}if(this.hide=function(){l()&&(a.unsetClass(h.targetElement,h.activeClass),a.picker.wrap.parentNode.removeChild(a.picker.wrap),delete a.picker.owner)},this.show=function(){o()},this.redraw=function(){l()&&o()},this.importColor=function(){this.valueElement&&a.isElementType(this.valueElement,"input")?this.refine?!this.required&&/^\s*$/.test(this.valueElement.value)?(this.valueElement.value="",this.styleElement&&(this.styleElement.style.backgroundImage=this.styleElement._jscOrigStyle.backgroundImage,this.styleElement.style.backgroundColor=this.styleElement._jscOrigStyle.backgroundColor,this.styleElement.style.color=this.styleElement._jscOrigStyle.color),this.exportColor(a.leaveValue|a.leaveStyle)):this.fromString(this.valueElement.value)||this.exportColor():this.fromString(this.valueElement.value,a.leaveValue)||(this.styleElement&&(this.styleElement.style.backgroundImage=this.styleElement._jscOrigStyle.backgroundImage,this.styleElement.style.backgroundColor=this.styleElement._jscOrigStyle.backgroundColor,this.styleElement.style.color=this.styleElement._jscOrigStyle.color),this.exportColor(a.leaveValue|a.leaveStyle)):this.exportColor()},this.exportColor=function(e){if(!(e&a.leaveValue)&&this.valueElement){var t=this.toString();this.uppercase&&(t=t.toUpperCase()),this.hash&&(t="#"+t),a.isElementType(this.valueElement,"input")?this.valueElement.value=t:this.valueElement.innerHTML=t}if(!(e&a.leaveStyle)&&this.styleElement){var n="#"+this.toString(),r=this.isLight()?"#000":"#FFF";this.styleElement.style.backgroundImage="none",this.styleElement.style.backgroundColor=n,this.styleElement.style.color=r,this.overwriteImportant&&this.styleElement.setAttribute("style","background: "+n+" !important; color: "+r+" !important;")}e&a.leavePad||!l()||i(),e&a.leaveSld||!l()||s()},this.fromHSV=function(e,t,n,o){if(null!==e){if(isNaN(e))return!1;e=Math.max(0,Math.min(360,e))}if(null!==t){if(isNaN(t))return!1;t=Math.max(0,Math.min(100,this.maxS,t),this.minS)}if(null!==n){if(isNaN(n))return!1;n=Math.max(0,Math.min(100,this.maxV,n),this.minV)}this.rgb=r(null===e?this.hsv[0]:this.hsv[0]=e,null===t?this.hsv[1]:this.hsv[1]=t,null===n?this.hsv[2]:this.hsv[2]=n),this.exportColor(o)},this.fromRGB=function(e,t,n,o){if(null!==e){if(isNaN(e))return!1;e=Math.max(0,Math.min(255,e))}if(null!==t){if(isNaN(t))return!1;t=Math.max(0,Math.min(255,t))}if(null!==n){if(isNaN(n))return!1;n=Math.max(0,Math.min(255,n))}var i=function(e,t,n){e/=255,t/=255,n/=255;var r=Math.min(Math.min(e,t),n),o=Math.max(Math.max(e,t),n),i=o-r;if(0===i)return[null,0,100*o];var s=e===r?3+(n-t)/i:t===r?5+(e-n)/i:1+(t-e)/i;return[60*(6===s?0:s),i/o*100,100*o]}(null===e?this.rgb[0]:e,null===t?this.rgb[1]:t,null===n?this.rgb[2]:n);null!==i[0]&&(this.hsv[0]=Math.max(0,Math.min(360,i[0]))),0!==i[2]&&(this.hsv[1]=null===i[1]?null:Math.max(0,this.minS,Math.min(100,this.maxS,i[1]))),this.hsv[2]=null===i[2]?null:Math.max(0,this.minV,Math.min(100,this.maxV,i[2]));var s=r(this.hsv[0],this.hsv[1],this.hsv[2]);this.rgb[0]=s[0],this.rgb[1]=s[1],this.rgb[2]=s[2],this.exportColor(o)},this.fromString=function(e,t){var n;if(n=e.match(/^\W*([0-9A-F]{3}([0-9A-F]{3})?)\W*$/i))return 6===n[1].length?this.fromRGB(parseInt(n[1].substr(0,2),16),parseInt(n[1].substr(2,2),16),parseInt(n[1].substr(4,2),16),t):this.fromRGB(parseInt(n[1].charAt(0)+n[1].charAt(0),16),parseInt(n[1].charAt(1)+n[1].charAt(1),16),parseInt(n[1].charAt(2)+n[1].charAt(2),16),t),!0;if(n=e.match(/^\W*rgba?\(([^)]*)\)\W*$/i)){var r,o,i,s=n[1].split(","),l=/^\s*(\d*)(\.\d+)?\s*$/;if(s.length>=3&&(r=s[0].match(l))&&(o=s[1].match(l))&&(i=s[2].match(l))){var a=parseFloat((r[1]||"0")+(r[2]||"")),d=parseFloat((o[1]||"0")+(o[2]||"")),c=parseFloat((i[1]||"0")+(i[2]||""));return this.fromRGB(a,d,c,t),!0}}return!1},this.toString=function(){return(256|Math.round(this.rgb[0])).toString(16).substr(1)+(256|Math.round(this.rgb[1])).toString(16).substr(1)+(256|Math.round(this.rgb[2])).toString(16).substr(1)},this.toHEXString=function(){return"#"+this.toString().toUpperCase()},this.toRGBString=function(){return"rgb("+Math.round(this.rgb[0])+","+Math.round(this.rgb[1])+","+Math.round(this.rgb[2])+")"},this.isLight=function(){return.213*this.rgb[0]+.715*this.rgb[1]+.072*this.rgb[2]>127.5},this._processParentElementsInDOM=function(){if(!this._linkedElementsProcessed){this._linkedElementsProcessed=!0;var e=this.targetElement;do{var t=a.getStyle(e);t&&"fixed"===t.position.toLowerCase()&&(this.fixed=!0),e!==this.targetElement&&(e._jscEventsAttached||(a.attachEvent(e,"scroll",a.onParentScroll),e._jscEventsAttached=!0))}while((e=e.parentNode)&&!a.isElementType(e,"body"))}},"string"==typeof e){var d=e,c=document.getElementById(d);c?this.targetElement=c:a.warn("Could not find target element with ID '"+d+"'")}else e?this.targetElement=e:a.warn("Invalid target element: '"+e+"'");if(this.targetElement._jscLinkedInstance)a.warn("Cannot link jscolor twice to the same element. Skipping.");else{this.targetElement._jscLinkedInstance=this,this.valueElement=a.fetchElement(this.valueElement),this.styleElement=a.fetchElement(this.styleElement);var h=this,p=this.container?a.fetchElement(this.container):document.getElementsByTagName("body")[0],u=3;if(a.isElementType(this.targetElement,"button"))if(this.targetElement.onclick){var m=this.targetElement.onclick;this.targetElement.onclick=function(e){return m.call(this,e),!1}}else this.targetElement.onclick=function(){return!1};if(this.valueElement&&a.isElementType(this.valueElement,"input")){var v=function(){h.fromString(h.valueElement.value,a.leaveValue),a.dispatchFineChange(h)};a.attachEvent(this.valueElement,"keyup",v),a.attachEvent(this.valueElement,"input",v),a.attachEvent(this.valueElement,"blur",function(){h.importColor()}),this.valueElement.setAttribute("autocomplete","off")}this.styleElement&&(this.styleElement._jscOrigStyle={backgroundImage:this.styleElement.style.backgroundImage,backgroundColor:this.styleElement.style.backgroundColor,color:this.styleElement.style.color}),this.value?this.fromString(this.value)||this.exportColor():this.importColor()}}}).jscolor.lookupClass="jscolor",a.jscolor.installByClassName=function(e){var t=document.getElementsByTagName("input"),n=document.getElementsByTagName("button");a.tryInstallOnElements(t,e),a.tryInstallOnElements(n,e)},a.register(),a.jscolor))}]);