    var $$ = function (id) {
        return "string" == typeof id ? document.getElementById(id) : id;
      };
      var Extend = function(destination, source) {
        for (var property in source) {
          destination[property] = source[property];
        }
        return destination;
      };
      var CurrentStyle = function(element){
        return element.currentStyle || document.defaultView.getComputedStyle(element, null);
      };
      var Bind = function(object, fun) {
        var args = Array.prototype.slice.call(arguments).slice(2);
        return function() {
          return fun.apply(object, args.concat(Array.prototype.slice.call(arguments)));
        }
      };
      var forEach = function(array, callback, thisObject){
        if(array.forEach){
          array.forEach(callback, thisObject);
        }else{
          for (var i = 0, len = array.length; i < len; i++) {callback.call(thisObject, array[i], i, array);}
        }
      };
      var Tween = {
        Quart: {
          easeOut: function(t,b,c,d){
            return -c * ((t=t/d-1)*t*t*t - 1) + b;
          }
        },
        Back: {
          easeOut: function(t,b,c,d,s){
            if (s == undefined) s = 1.70158;
            return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
          }
        },
        Bounce: {
          easeOut: function(t,b,c,d){
            if ((t/=d) < (1/2.75)) {
              return c*(7.5625*t*t) + b;
            } else if (t < (2/2.75)) {
              return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
            } else if (t < (2.5/2.75)) {
              return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
            } else {
              return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
            }
          }
        }
      };
      var tween = {
          easeInQuad: function(pos){
              return Math.pow(pos, 2);
          },
          easeOutQuad: function(pos){
              return -(Math.pow((pos-1), 2) -1);
          },
          easeInOutQuad: function(pos){
              if ((pos/=0.5) < 1) return 0.5*Math.pow(pos,2);
              return -0.5 * ((pos-=2)*pos - 2);
          },
          easeInCubic: function(pos){
              return Math.pow(pos, 3);
          },
          easeOutCubic: function(pos){
              return (Math.pow((pos-1), 3) +1);
          },
          easeInOutCubic: function(pos){
              if ((pos/=0.5) < 1) return 0.5*Math.pow(pos,3);
              return 0.5 * (Math.pow((pos-2),3) + 2);
          },
          easeInQuart: function(pos){
              return Math.pow(pos, 4);
          },
          easeOutQuart: function(pos){
              return -(Math.pow((pos-1), 4) -1)
          },
          easeInOutQuart: function(pos){
              if ((pos/=0.5) < 1) return 0.5*Math.pow(pos,4);
              return -0.5 * ((pos-=2)*Math.pow(pos,3) - 2);
          },
          easeInQuint: function(pos){
              return Math.pow(pos, 5);
          },
          easeOutQuint: function(pos){
              return (Math.pow((pos-1), 5) +1);
          },
          easeInOutQuint: function(pos){
              if ((pos/=0.5) < 1) return 0.5*Math.pow(pos,5);
              return 0.5 * (Math.pow((pos-2),5) + 2);
          },
          easeInSine: function(pos){
              return -Math.cos(pos * (Math.PI/2)) + 1;
          },
          easeOutSine: function(pos){
              return Math.sin(pos * (Math.PI/2));
          },
          easeInOutSine: function(pos){
              return (-.5 * (Math.cos(Math.PI*pos) -1));
          },
          easeInExpo: function(pos){
              return (pos==0) ? 0 : Math.pow(2, 10 * (pos - 1));
          },
          easeOutExpo: function(pos){
              return (pos==1) ? 1 : -Math.pow(2, -10 * pos) + 1;
          },
          easeInOutExpo: function(pos){
              if(pos==0) return 0;
              if(pos==1) return 1;
              if((pos/=0.5) < 1) return 0.5 * Math.pow(2,10 * (pos-1));
              return 0.5 * (-Math.pow(2, -10 * --pos) + 2);
          },
          easeInCirc: function(pos){
              return -(Math.sqrt(1 - (pos*pos)) - 1);
          },
          easeOutCirc: function(pos){
              return Math.sqrt(1 - Math.pow((pos-1), 2))
          },
          easeInOutCirc: function(pos){
              if((pos/=0.5) < 1) return -0.5 * (Math.sqrt(1 - pos*pos) - 1);
              return 0.5 * (Math.sqrt(1 - (pos-=2)*pos) + 1);
          },
          easeOutBounce: function(pos){
              if ((pos) < (1/2.75)) {
                  return (7.5625*pos*pos);
              } else if (pos < (2/2.75)) {
                  return (7.5625*(pos-=(1.5/2.75))*pos + .75);
              } else if (pos < (2.5/2.75)) {
                  return (7.5625*(pos-=(2.25/2.75))*pos + .9375);
              } else {
                  return (7.5625*(pos-=(2.625/2.75))*pos + .984375);
              }
          },
          easeInBack: function(pos){
              var s = 1.70158;
              return (pos)*pos*((s+1)*pos - s);
          },
          easeOutBack: function(pos){
              var s = 1.70158;
              return (pos=pos-1)*pos*((s+1)*pos + s) + 1;
          },
          easeInOutBack: function(pos){
              var s = 1.70158;
              if((pos/=0.5) < 1) return 0.5*(pos*pos*(((s*=(1.525))+1)*pos -s));
              return 0.5*((pos-=2)*pos*(((s*=(1.525))+1)*pos +s) +2);
          },
          elastic: function(pos) {
              return -1 * Math.pow(4,-8*pos) * Math.sin((pos*6-1)*(2*Math.PI)/2) + 1;
          },
          swingFromTo: function(pos) {
              var s = 1.70158;
              return ((pos/=0.5) < 1) ? 0.5*(pos*pos*(((s*=(1.525))+1)*pos - s)) :
                  0.5*((pos-=2)*pos*(((s*=(1.525))+1)*pos + s) + 2);
          },
          swingFrom: function(pos) {
              var s = 1.70158;
              return pos*pos*((s+1)*pos - s);
          },
          swingTo: function(pos) {
              var s = 1.70158;
              return (pos-=1)*pos*((s+1)*pos + s) + 1;
          },
          bounce: function(pos) {
              if (pos < (1/2.75)) {
                  return (7.5625*pos*pos);
              } else if (pos < (2/2.75)) {
                  return (7.5625*(pos-=(1.5/2.75))*pos + .75);
              } else if (pos < (2.5/2.75)) {
                  return (7.5625*(pos-=(2.25/2.75))*pos + .9375);
              } else {
                  return (7.5625*(pos-=(2.625/2.75))*pos + .984375);
              }
          },
          bouncePast: function(pos) {
              if (pos < (1/2.75)) {
                  return (7.5625*pos*pos);
              } else if (pos < (2/2.75)) {
                  return 2 - (7.5625*(pos-=(1.5/2.75))*pos + .75);
              } else if (pos < (2.5/2.75)) {
                  return 2 - (7.5625*(pos-=(2.25/2.75))*pos + .9375);
              } else {
                  return 2 - (7.5625*(pos-=(2.625/2.75))*pos + .984375);
              }
          },
          easeFromTo: function(pos) {
              if ((pos/=0.5) < 1) return 0.5*Math.pow(pos,4);
              return -0.5 * ((pos-=2)*Math.pow(pos,3) - 2);
          },
          easeFrom: function(pos) {
              return Math.pow(pos,4);
          },
          easeTo: function(pos) {
              return Math.pow(pos,0.25);
          },
          linear:  function(pos) {
              return pos
          },
          sinusoidal: function(pos) {
              return (-Math.cos(pos*Math.PI)/2) + 0.5;
          },
          reverse: function(pos) {
              return 1 - pos;
          },
          mirror: function(pos, transition) {
              transition = transition || tween.sinusoidal;
              if(pos<0.5)
                  return transition(pos*2);
              else
                  return transition(1-(pos-0.5)*2);
          },
          flicker: function(pos) {
              var pos = pos + (Math.random()-0.5)/5;
              return tween.sinusoidal(pos < 0 ? 0 : pos > 1 ? 1 : pos);
          },
          wobble: function(pos) {
              return (-Math.cos(pos*Math.PI*(9*pos))/2) + 0.5;
          },
          pulse: function(pos, pulses) {
              return (-Math.cos((pos*((pulses||5)-.5)*2)*Math.PI)/2) + .5;
          },
          blink: function(pos, blinks) {
              return Math.round(pos*(blinks||5)) % 2;
          },
          spring: function(pos) {
              return 1 - (Math.cos(pos * 4.5 * Math.PI) * Math.exp(-pos * 6));
          },
          none: function(pos){
              return 0
          },
          full: function(pos){
              return 1
          }
      };
      var getStyle = function(el, style){
          if(!+"\v1"){
              style = style.replace(/\-(\w)/g, function(all, letter){
                  return letter.toUpperCase();
              });
              var value = el.currentStyle[style];
              (value == "auto")&&(value = "0px" );
              return value;
          }else{
              return document.defaultView.getComputedStyle(el, null).getPropertyValue(style)
          }
      };
      var _ = function(id){
          return document.getElementById(id);
      };
      var transition = function(el){
          el.style.position = "absolute";
          var options = arguments[1] || {},
          begin =  options.begin,//????????????
          change = options.change,//?????????
          duration = options.duration || 500,//????????????????????????
          field = options.field,//???????????????????????????top,left,width,height????????????????????????
          ftp = options.ftp || 50,
          onEnd = options.onEnd || function(){},
          ease = options.ease,//????????????????????????
          end = begin + change,//????????????
          startTime = new Date().getTime();//?????????????????????
          (function(){
              setTimeout(function(){
                  var newTime = new Date().getTime(),//????????????????????????
                  timestamp = newTime - startTime,//????????????
                  delta = ease(timestamp / duration);
                  el.style[field] = Math.ceil(begin + delta * change) + "px"
                  if(duration <= timestamp){
                      el.style[field] = end + "px";
                      onEnd();
                  }else{
                      setTimeout(arguments.callee,1000/ftp);
                  }
              },1000/ftp)
          })()
      };
      //????????????,????????????,????????????
      var SlideTrans = function(container, slider, count, options) {
        this._slider = $$(slider);
        this._container = $$(container);//????????????
        this._timer = null;//?????????
        this._count = Math.abs(count);//????????????
        this._target = 0;//?????????
        this._t = this._b = this._c = 0;//tween??????
        
        this.Index = 0;//????????????
        
        this.SetOptions(options);
        
        this.Auto = !!this.options.Auto;
        this.Duration = Math.abs(this.options.Duration);
        this.Time = Math.abs(this.options.Time);
        this.Pause = Math.abs(this.options.Pause);
        this.Tween = this.options.Tween;
        this.onStart = this.options.onStart;
        this.onFinish = this.options.onFinish;
        
        var bVertical = !!this.options.Vertical;
        this._css = bVertical ? "top" : "left";//??????
        
        //????????????
        var p = CurrentStyle(this._container).position;
        p == "relative" || p == "absolute" || (this._container.style.position = "relative");
        this._container.style.overflow = "hidden";
        this._slider.style.position = "absolute";
        
        this.Change = this.options.Change ? this.options.Change :
          this._slider[bVertical ? "offsetHeight" : "offsetWidth"] / this._count;
      };
      SlideTrans.prototype = {
        //??????????????????
        SetOptions: function(options) {
        this.options = {//?????????
          Vertical:	true,//???????????????????????????????????????
          Auto:		true,//????????????
          Change:		0,//?????????
          Duration:	30,//??????????????????
          Time:		10,//????????????
          Pause:		3000,//????????????(Auto???true?????????)
          onStart:	function(){},//?????????????????????
          onFinish:	function(){},//?????????????????????
          Tween:		Tween.Quart.easeOut//tween??????
        };
        Extend(this.options, options || {});
        },
        //????????????
        Run: function(index) {
        //??????index
        index == undefined && (index = this.Index);
        index < 0 && (index = this._count - 1) || index >= this._count && (index = 0);
        //????????????
        this._target = -Math.abs(this.Change) * (this.Index = index);
        this._t = 0;
        this._b = parseInt(CurrentStyle(this._slider)[this.options.Vertical ? "top" : "left"]);
        this._c = this._target - this._b;
        
        this.onStart();
        this.Move();
        },
        //??????
        Move: function() {
        clearTimeout(this._timer);
        //??????????????????????????????????????????????????????
        if (this._c && this._t < this.Duration) {
          this.MoveTo(Math.round(this.Tween(this._t++, this._b, this._c, this.Duration)));
          this._timer = setTimeout(Bind(this, this.Move), this.Time);
        }else{
          this.MoveTo(this._target);
          this.Auto && (this._timer = setTimeout(Bind(this, this.Next), this.Pause));
        }
        },
        //?????????
        MoveTo: function(i) {
        this._slider.style[this._css] = i + "px";
        },
        //?????????
        Next: function() {
        this.Run(++this.Index);
        },
        //?????????
        Previous: function() {
        this.Run(--this.Index);
        },
        //??????
        Stop: function() {
        clearTimeout(this._timer); this.MoveTo(this._target);
        }
      };
      function show_index_notice(obj,id){
        var ps = obj.parentNode.getElementsByTagName("p");
        for(var i=0;i<ps.length;i++){
          ps[i].className = "";
        }
        obj.className = "curr";
        var uls = obj.parentNode.parentNode.getElementsByTagName("ul");
        for(var k=0;k<uls.length;k++){
          uls[k].style.display = "none";
        }
        $(id).style.display = "block";
      }
      var iBase = {
          getId: function(name) {return document.getElementById(name);},//??????id
          SetOpacity:function(ev,v){ev.filters ? ev.style.filter="alpha(opacity="+v+")":ev.style.opacity=v/100;}//???????????????
      }
      //????????????(???????????????????????????)
      function fadeIn(elem, speed, opacity ,decrease){
          /*
           * ????????????
           * elem==>?????????????????????
           * speed==>????????????,?????????(??????)
           * opacity==>???????????????????????????,0~100(??????)
           * decrease==>?????????
           */
          speed = speed || 20;
          opacity = opacity || 100;
          decrease = decrease || 5;
          //????????????,??????????????????0?????????(?????????)
          elem.style.display = 'block';
          iBase.SetOpacity(elem, 0);
          //??????????????????????????????0
          var val = 0;
          //?????????????????????5??????,???????????????
          (function(){
              iBase.SetOpacity(elem, val);
              val += decrease;
              if (val <= opacity) {
                  setTimeout(arguments.callee, speed)
              }
          })();
      }
       
      //????????????(???????????????????????????)
      function fadeOut(elem, speed, opacity, decrease , val){
          /*
           * ????????????
           * elem==>?????????????????????
           * speed==>????????????,?????????(??????)
           * opacity==>???????????????????????????,0~100(??????)
           * decrease==>?????????
           * val==>??????????????????
           */
          speed = speed || 20;
          opacity = opacity || 0;
          decrease = decrease || 5;
          //??????????????????????????????0
          var val = val || 10;
          //?????????????????????5??????,???????????????
          (function(){
              iBase.SetOpacity(elem, val);
              val -= decrease;
              if (val >= opacity) {
                  setTimeout(arguments.callee, speed);
              }else if (val < 0) {
                  //??????????????????0???????????????
                  elem.style.display = 'none';
              }
          })();
      }
      function showelem(elem, speed, opacity, decrease ,e, obj){
        e=e||window.event;
        if(!isMouseLeaveOrEnter(e,obj)) return;
        fadeIn(elem, speed, opacity ,decrease);
      }
      function hiddenelem(elem, speed, opacity, decrease, val, e, obj){
        e=e||window.event;
        if(!isMouseLeaveOrEnter(e,obj)) return;
        fadeOut(elem, speed, opacity, decrease, val);
      }
      function showimgbox(elem,e){
        e=e||window.event;
        if(!isMouseLeaveOrEnter(e,elem)) return;
        var obj = elem.getElementsByTagName("div")[0];
        if(obj.style.display == "none"){
          var divs = elem.parentNode.parentNode.getElementsByTagName("div");
          for(var i=0;i<divs.length;i++){
            if(divs[i].className == "imgbox_gray"){
              divs[i].style.opacity = "0.3";
              divs[i].style.filter = "alpha(opacity=30)";
              divs[i].style.display = "block";
            }
          }
          obj.style.opacity = "0";
          obj.style.display = "none";
          obj.style.filter = "alpha(opacity=0)";
        }
        else{
          fadeOut(obj,20,0,5,30);
        }
      }
      function hiddenimgbox(elem,e){
        e=e||window.event;
        if(!isMouseLeaveOrEnter(e,elem)) return;
        fadeIn(elem.getElementsByTagName("div")[0],20,30,5);
      }
      function hiddenallimgbox(elem,e){
        e=e||window.event;
        if(!isMouseLeaveOrEnter(e,elem)) return;
        var divs = elem.getElementsByTagName("div");
        for(var i=0;i<divs.length;i++){
          if(divs[i].className == "imgbox_gray"){
            divs[i].style.opacity = "0";
            divs[i].style.filter = "alpha(opacity=0)";
            divs[i].style.display = "none";
          }
        }
      }
      function showlibox(elem,e){
        e=e||window.event;
        if(!isMouseLeaveOrEnter(e,elem)) return;
        var obj = elem.getElementsByTagName("div")[0];
        obj.style.display = "block";
        fadeIn(obj,20,10,2);
      }
      function hiddenlibox(elem,e){
        e=e||window.event;
        if(!isMouseLeaveOrEnter(e,elem)) return;
        fadeOut(elem.getElementsByTagName("div")[0],20,0,2);
      }
      function hiddenalllibox(elem,e){
        e=e||window.event;
        if(!isMouseLeaveOrEnter(e,elem)) return;
        var divs = elem.getElementsByTagName("div");
        for(var i=0;i<divs.length;i++){
          if(divs[i].className == "ul_box"){
            divs[i].style.opacity = "0";
            divs[i].style.filter = "alpha(opacity=0)";
            divs[i].style.display = "none";
          }
        }
      }
      function showhotbtn(elem,e){
        e=e||window.event;
        if(!isMouseLeaveOrEnter(e,elem)) return;
        
        $$("hotleft").style.display = "block";
        $$("hotright").style.display = "block";
      }
      function hiddenhotbtn(elem,e){
        e=e||window.event;
        if(!isMouseLeaveOrEnter(e,elem)) return;
        
      }