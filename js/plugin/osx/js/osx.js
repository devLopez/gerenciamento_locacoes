function mpCloseMiniBoxes() {
    $(".mpMiniBox").clearQueue().animate({
        opacity: 0
    }, 300, function() {
        $(this).remove();
    });
}

function mpCloseAllModals() {
    $(".mpModalPopUp").clearQueue().removeClass().addClass("mpModalPopUp").animate({
        opacity: 0
    }, 300, function() {
        $(this).remove();
    });
}

function mpOpenCloseBar(a, b) {
    void 0 == a && (a = 300);
    var c = $("#mpNotificationPanel"),
        d = c.attr("OpenClose");
    if ("close" == d && 0 == b) return 0;
    var e = $(window).width();
    "close" == d ? (c.attr("OpenClose", "open"), $("#mpNotificationPanel").clearQueue()
        .animate({
            right: "0px"
        }, a, function() {
            $("#mpNotiClear").clearQueue().animate({
                opacity: 1
            }, 150), $("#mpNotiClose").clearQueue().animate({
                opacity: 1
            }, 150)
        }), e > 680 && $("#mpSmallbox").clearQueue().animate({
            right: "370px"
        }, a + 50)) : ($("#mpNotiClear").clearQueue().animate({
            opacity: 0
        }, 150), $("#mpNotiClose").clearQueue().animate({
            opacity: 0
        }, 150), c.attr("OpenClose", "close"), $("#mpNotificationPanel")
        .clearQueue().animate({
            right: "-350px"
        }, a), e > 680 && $("#mpSmallbox").clearQueue().animate({
            right: "25px"
        }, a + 50))
}

function SetNotificationBackground(a) {
    $("#mpNotificationPanel").css("background-image", "url(" + a + ")")
}! function(a) {
    function x() {
        a(window).height();
        var c = a(window).width();
        a(".mpBanner").each(function() {
            var b = a(this);
            c > 500 && b.find(".mpBannerTextbox").css("width",
                "500px");
            var d = b.find(".mpBannerTitle").width(),
                e = b.find(".mpBannerTextbox").width(),
                f = b.find(".mpBannerImgboxImg").height(),
                g = d + e + f + 110;
            g = g > c ? c - 70 : 500, c > 660 ? b.find(
                    ".mpBannerContainer").css("width", "800px") :
                b.find(".mpBannerContainer").css("width",
                    "100%"), b.find(".mpBannerTextbox").css(
                    "width", g + "px")
        })
    }

    function y() {
        var b = a(window).height();
        a(".mpMsgbox").each(function() {
            var c = a(this),
                d = c.height();
            b /= 2, d /= 2;
            var e = b - d,
                f = a(window).width(),
                g = c.find(".mpMsgContainer").width();
            f /= 2, g /= 2;
            var h = f - g;
            c.css({
                position: "fixed",
                top: e + "px",
                left: h + "px"
            });
            var f = a(window).width(),
                i = c.attr("size");
            g = i.replace("px", "").replace("%", ""), f > g ? (
                c.find(".mpMsgHeader").css("width", i), c.find(
                    ".mpMsgContainer").css("width", i)) : (
                c.find(".mpMsgHeader").css("width", "98%"),
                c.find(".mpMsgContainer").css("width",
                    "98%"));
            var j = 0,
                k = 0;
            c.find(".mpMsgImg").length > 0 && (c.find(
                        ".mpMsgImg").removeAttr("style"), j = c
                    .find(".mpMsgImg").height()), c.find(
                    ".mpMsgContent").removeAttr("style"), k = c
                .find(".mpMsgContent").height(), k > j && c.find(
                    ".mpMsgImg").css("height", k + "px"), c.find(
                    ".mpMsgContent").css("margin-bottom",
                    "15px")
        })
    }

    function z() {
        var b = a(window).height(),
            c = a(window).width(),
            d = c;
        a(".mpLoginBox").each(function() {
            var e = a(this),
                f = e.height();
            b /= 2, f /= 2;
            var g = b - f,
                h = e.find(".mpLoginContainer").width(),
                i = e.attr("NoTitleNoContent");
            c /= 2, h /= 2;
            var j = c - h;
            e.css({
                position: "fixed",
                top: g + "px",
                left: j + "px"
            });
            var k = e.attr("size");
            OriginalWidth = k.replace("px", "").replace("%", ""),
                d > OriginalWidth ? (e.find(".mpLoginHeader").css(
                        "width", k), e.find(".mpLoginContainer")
                    .css("width", k)) : (e.find(
                    ".mpLoginHeader").css("width", d - 10 +
                    "px"), e.find(".mpLoginContainer").css(
                    "width", d - 10 + "px"));
            var l = e.find(".mpLoginContainer").width();
            300 > l ? (e.find(".mpLoginForm").css("margin-left",
                    "10px"), e.find(".mpFieldText").css(
                    "left", "90px"), e.find(".mpLoginText")
                .css("font-size", "14px"), e.find(
                    ".mpInputcontrol").css({
                    width: d - 40 + "px",
                    left: "-90px"
                }), 0 == i ? e.find(".mlLoginImg").css({
                    height: "35px",
                    width: "35px"
                }) : e.find(".mlLoginImg").hide(), l -= 110
            ) : (e.find(".mlLoginImg").show(), e.find(
                    ".mpLoginForm").css("margin-left",
                    "100px"), e.find(".mpFieldText").css(
                    "left", "180px"), e.find(".mpLoginText")
                .css("font-size", "16px"), e.find(
                    ".mpInputcontrol").css({
                    width: "90%",
                    left: "0px"
                }), e.find(".mlLoginImg").css({
                    height: "80px",
                    width: "80px"
                }), l -= 210), e.find(".mpFieldText").css(
                "width", l + "px")
        })
    }

    function A() {
        var b = a(window).width(),
            c = a("#mpNotiClear"),
            d = a("#mpNotiClose");
        b > 350 ? (c.css("right", "50px"), d.css("right", "185px")) : (
            c.css("right", "10px"), d.css("right", "145px"))
    }

    function B() {
        var b = a(window).width(),
            c = 680,
            d = a("#mpNotificationPanel"),
            e = d.attr("OpenClose");
        "open" == e ? b > c ? a("#mpSmallbox").clearQueue().animate({
            right: "370px"
        }, 300) : 450 > b ? a("#mpSmallbox").clearQueue().animate({
            right: "0px"
        }, 300) : a("#mpSmallbox").clearQueue().animate({
            right: "25px"
        }, 300) : 450 > b ? a("#mpSmallbox").clearQueue().animate({
            right: "0px"
        }, 300) : a("#mpSmallbox").clearQueue().animate({
            right: "25px"
        }, 300)
    }

    function C() {
        if (0 == o) {
            u = a(".swiper-NotificationPanel").swiper({
                mode: "vertical",
                loop: !1,
                slidesPerView: "auto",
                freeMode: !0,
                visibilityFullFit: !1,
                calculateHeight: !1,
                autoResize: !0,
                resizeReInit: !0,
                freeModeFluid: !0,
                mousewheelControl: !0
            }), u.removeAllSlides();
            var c = "";
            c += '<div id="mpEmpySlide" class="mpNotiSubContentEmpty">',
                c += '<div class="mpNotiContent" align="center">', c +=
                b, c += "</div>", c += "</div>", u.prependSlide("&nbsp"),
                u.prependSlide("&nbsp"), u.prependSlide("&nbsp"), u.prependSlide(
                    "&nbsp"), u.prependSlide("&nbsp"), u.prependSlide(
                    "&nbsp"), u.prependSlide("&nbsp"), u.prependSlide(
                    "&nbsp");
            var d = u.createSlide(c);
            u.appendSlide(d), u.swipeTo(0), a("#mpEmpySlide").clearQueue()
                .animate({
                    opacity: 1
                }), u.reInit()
        }
    }

    function D() {
        a(window).width();
        var c = a(window).height();
        a(".mpMiniBox").each(function() {
            var b = a(this),
                d = b.height();
            c /= 2, d /= 2;
            var e = c - d,
                f = a(window).width(),
                g = b.width();
            f /= 2, g /= 2;
            var h = f - g;
            b.css({
                position: "fixed",
                top: e + "px",
                left: h + "px"
            })
        })
    }

    function E(b) {
        var c = a(window).width(),
            d = a(window).height();
        a(".mpModalPopUp").each(function() {
            var e = a(this),
                f = e.height();
            windowHeight2 = d / 2, ThisHeight2 = f / 2;
            var g = windowHeight2 - ThisHeight2 - 17,
                h = e.width();
            windowWidth2 = c / 2, h /= 2;
            var i = windowWidth2 - h - 10;
            1 == b ? e.css({
                    top: g + "px",
                    left: i + "px"
                }, 300) : e.clearQueue().animate({
                    top: g + "px",
                    left: i + "px"
                }, 300), f = e.attr("OriginalheightPx"), d > f ?
                e.css("height", e.attr("Originalheight")) : e.css({
                    height: d - 41 + "px",
                    top: "3px"
                }), h = e.attr("OriginalwidthPx"), c > f ? e.css(
                    "width", e.attr("OriginalWidth")) : e.css({
                    width: c - 30 + "px",
                    left: "5px"
                })
        })
    }

    function F() {
        var b = a(window).width(),
            c = a(window).height();
        a(".mpSidePanel").each(function() {
            var d = a(this),
                e = d.attr("OriginalWidth");
            d.css("width", e);
            var f = d.width();
            d.css("height", c + "px"), parseInt(f) > parseInt(b) ?
                d.css("width", b - 40) : d.css("width", e)
        })
    }
    var b = "You currently have no new notifications.",
        c = !0,
        d = !1,
        e = !0,
        f = "Minimize",
        g = "Maximize",
        h = "Close",
        i = function(a, b) {
            function c(a) {
                return document.querySelectorAll ? document.querySelectorAll(
                    a) : jQuery(a)
            }

            function d() {
                var a = A - D;
                return b.freeMode && (a = A - D), b.slidesPerView > x.slides
                    .length && (a = 0), 0 > a && (a = 0), a
            }

            function e() {
                function a(a) {
                    var c = new Image;
                    c.onload = function() {
                        x.imagesLoaded++, x.imagesLoaded == x.imagesToLoad
                            .length && (x.reInit(), b.onImagesReady &&
                                b.onImagesReady(x))
                    }, c.src = a
                }
                if (x.browser.ie10 ? (x.h.addEventListener(x.wrapper, x
                            .touchEvents.touchStart, n, !1), x.h.addEventListener(
                            document, x.touchEvents.touchMove, o, !1),
                        x.h.addEventListener(document, x.touchEvents.touchEnd,
                            p, !1)) : (x.support.touch && (x.h.addEventListener(
                            x.wrapper, "touchstart", n, !1), x.h.addEventListener(
                            x.wrapper, "touchmove", o, !1), x.h.addEventListener(
                            x.wrapper, "touchend", p, !1)), b.simulateTouch &&
                        (x.h.addEventListener(x.wrapper, "mousedown", n, !
                            1), x.h.addEventListener(document,
                            "mousemove", o, !1), x.h.addEventListener(
                            document, "mouseup", p, !1))), b.autoResize &&
                    x.h.addEventListener(window, "resize", x.resizeFix, !
                        1), f(), x._wheelEvent = !1, b.mousewheelControl
                ) {
                    void 0 !== document.onmousewheel && (x._wheelEvent =
                        "mousewheel");
                    try {
                        WheelEvent("wheel"), x._wheelEvent = "wheel"
                    } catch (d) {}
                    x._wheelEvent || (x._wheelEvent = "DOMMouseScroll"),
                        x._wheelEvent && x.h.addEventListener(x.container,
                            x._wheelEvent, i, !1)
                }
                if (b.keyboardControl && x.h.addEventListener(document,
                    "keydown", h, !1), b.updateOnImagesReady) {
                    document.querySelectorAll ? x.imagesToLoad = x.container
                        .querySelectorAll("img") : window.jQuery && (x.imagesToLoad =
                            c(x.container).find("img"));
                    for (var e = 0; x.imagesToLoad.length > e; e++) a(x
                        .imagesToLoad[e].getAttribute("src"))
                }
            }

            function f() {
                if (b.preventLinks) {
                    var a = [];
                    document.querySelectorAll ? a = x.container.querySelectorAll(
                        "a") : window.jQuery && (a = c(x.container)
                        .find("a"));
                    for (var d = 0; a.length > d; d++) x.h.addEventListener(
                        a[d], "click", l, !1)
                }
                if (b.releaseFormElements)
                    for (var e = document.querySelectorAll ? x.container
                            .querySelectorAll("input, textarea, select") :
                            c(x.container).find(
                                "input, textarea, select"), d = 0; e.length >
                        d; d++) x.h.addEventListener(e[d], x.touchEvents
                        .touchStart, m, !0);
                if (b.onSlideClick)
                    for (var d = 0; x.slides.length > d; d++) x.h.addEventListener(
                        x.slides[d], "click", j, !1);
                if (b.onSlideTouch)
                    for (var d = 0; x.slides.length > d; d++) x.h.addEventListener(
                        x.slides[d], x.touchEvents.touchStart, k, !
                        1)
            }

            function g() {
                if (b.onSlideClick)
                    for (var a = 0; x.slides.length > a; a++) x.h.removeEventListener(
                        x.slides[a], "click", j, !1);
                if (b.onSlideTouch)
                    for (var a = 0; x.slides.length > a; a++) x.h.removeEventListener(
                        x.slides[a], x.touchEvents.touchStart, k, !
                        1);
                if (b.releaseFormElements)
                    for (var d = document.querySelectorAll ? x.container
                            .querySelectorAll("input, textarea, select") :
                            c(x.container).find(
                                "input, textarea, select"), a = 0; d.length >
                        a; a++) x.h.removeEventListener(d[a], x.touchEvents
                        .touchStart, m, !0);
                if (b.preventLinks) {
                    var e = [];
                    document.querySelectorAll ? e = x.container.querySelectorAll(
                        "a") : window.jQuery && (e = c(x.container)
                        .find("a"));
                    for (var a = 0; e.length > a; a++) x.h.removeEventListener(
                        e[a], "click", l, !1)
                }
            }

            function h(a) {
                var b = a.keyCode || a.charCode;
                if (37 == b || 39 == b || 38 == b || 40 == b) {
                    for (var c = !1, d = x.h.getOffset(x.container), e =
                        x.h.windowScroll().left, f = x.h.windowScroll()
                        .top, g = x.h.windowWidth(), h = x.h.windowHeight(),
                        i = [
                            [d.left, d.top],
                            [d.left + x.width, d.top],
                            [d.left, d.top + x.height],
                            [d.left + x.width, d.top + x.height]
                        ], j = 0; i.length > j; j++) {
                        var k = i[j];
                        k[0] >= e && e + g >= k[0] && k[1] >= f && f +
                            h >= k[1] && (c = !0)
                    }
                    if (!c) return
                }
                H ? ((37 == b || 39 == b) && (a.preventDefault ? a.preventDefault() :
                        a.returnValue = !1), 39 == b && x.swipeNext(),
                    37 == b && x.swipePrev()) : ((38 == b || 40 ==
                        b) && (a.preventDefault ? a.preventDefault() :
                        a.returnValue = !1), 40 == b && x.swipeNext(),
                    38 == b && x.swipePrev())
            }

            function i(a) {
                var c, e = x._wheelEvent;
                if (a.detail ? c = -a.detail : "mousewheel" == e ? c =
                    a.wheelDelta : "DOMMouseScroll" == e ? c = -a.detail :
                    "wheel" == e && (c = Math.abs(a.deltaX) > Math.abs(
                        a.deltaY) ? -a.deltaX : -a.deltaY), b.freeMode) {
                    H ? x.getWrapperTranslate("x") : x.getWrapperTranslate(
                        "y");
                    var f, g;
                    H ? (f = x.getWrapperTranslate("x") + c, g = x.getWrapperTranslate(
                        "y"), f > 0 && (f = 0), -d() > f && (f = -
                        d())) : (f = x.getWrapperTranslate("x"), g =
                        x.getWrapperTranslate("y") + c, g > 0 && (g =
                            0), -d() > g && (g = -d())), x.setWrapperTransition(
                        0), x.setWrapperTranslate(f, g, 0)
                } else 0 > c ? x.swipeNext() : x.swipePrev();
                return b.autoplay && x.stopAutoplay(), a.preventDefault ?
                    a.preventDefault() : a.returnValue = !1, !1
            }

            function j() {
                x.allowSlideClick && (x.clickedSlide = this, x.clickedSlideIndex =
                    x.slides.indexOf(this), b.onSlideClick(x))
            }

            function k() {
                x.clickedSlide = this, x.clickedSlideIndex = x.slides.indexOf(
                    this), b.onSlideTouch(x)
            }

            function l(a) {
                return x.allowLinks ? void 0 : (a.preventDefault ? a.preventDefault() :
                    a.returnValue = !1, !1)
            }

            function m(a) {
                return a.stopPropagation ? a.stopPropagation() : a.returnValue = !
                    1, !1
            }

            function n(a) {
                if (b.preventLinks && (x.allowLinks = !0), x.isTouched ||
                    b.onlyExternal) return !1;
                if (b.noSwiping && a.target && a.target.className && a.target
                    .className.indexOf(b.noSwipingClass) > -1) return !
                    1;
                if (S = !1, x.isTouched = !0, R = "touchstart" == a.type, !
                    R || 1 == a.targetTouches.length) {
                    b.loop && x.fixLoop(), x.callPlugins(
                        "onTouchStartBegin"), R || (a.preventDefault ?
                        a.preventDefault() : a.returnValue = !1);
                    var c = R ? a.targetTouches[0].pageX : a.pageX || a
                        .clientX,
                        d = R ? a.targetTouches[0].pageY : a.pageY || a
                        .clientY;
                    x.touches.startX = x.touches.currentX = c, x.touches
                        .startY = x.touches.currentY = d, x.touches.start =
                        x.touches.current = H ? c : d, x.setWrapperTransition(
                            0), x.positions.start = x.positions.current =
                        H ? x.getWrapperTranslate("x") : x.getWrapperTranslate(
                            "y"), H ? x.setWrapperTranslate(x.positions
                            .start, 0, 0) : x.setWrapperTranslate(0, x.positions
                            .start, 0), x.times.start = (new Date).getTime(),
                        C = void 0, b.moveStartThreshold > 0 && (O = !1),
                        b.onTouchStart && b.onTouchStart(x), x.callPlugins(
                            "onTouchStartEnd")
                }
            }

            function o(a) {
                if (x.isTouched && !b.onlyExternal && (!R ||
                    "mousemove" != a.type)) {
                    var c = R ? a.targetTouches[0].pageX : a.pageX || a
                        .clientX,
                        e = R ? a.targetTouches[0].pageY : a.pageY || a
                        .clientY;
                    if (void 0 === C && H && (C = !!(C || Math.abs(e -
                        x.touches.startY) > Math.abs(c - x.touches
                        .startX))), void 0 !== C || H || (C = !!(C ||
                        Math.abs(e - x.touches.startY) < Math.abs(
                            c - x.touches.startX))), C) return x.isTouched = !
                        1, void 0;
                    if (a.assignedToSwiper) return x.isTouched = !1,
                        void 0;
                    if (a.assignedToSwiper = !0, x.isMoved = !0, b.preventLinks &&
                        (x.allowLinks = !1), b.onSlideClick && (x.allowSlideClick = !
                            1), b.autoplay && x.stopAutoplay(), !R || 1 ==
                        a.touches.length) {
                        if (x.callPlugins("onTouchMoveStart"), a.preventDefault ?
                            a.preventDefault() : a.returnValue = !1, x.touches
                            .current = H ? c : e, x.positions.current =
                            (x.touches.current - x.touches.start) * b.touchRatio +
                            x.positions.start, x.positions.current > 0 &&
                            b.onResistanceBefore && b.onResistanceBefore(
                                x, x.positions.current), x.positions.current <
                            -d() && b.onResistanceBefore && b.onResistanceAfter(
                                x, Math.abs(x.positions.current + d())),
                            b.resistance && "100%" != b.resistance) {
                            if (x.positions.current > 0) {
                                var f = 1 - x.positions.current / D / 2;
                                x.positions.current = .5 > f ? D / 2 :
                                    x.positions.current * f
                            }
                            if (x.positions.current < -d()) {
                                var g = (x.touches.current - x.touches.start) *
                                    b.touchRatio + (d() + x.positions.start),
                                    f = (D + g) / D,
                                    h = x.positions.current - g * (1 -
                                        f) / 2,
                                    i = -d() - D / 2;
                                x.positions.current = i > h || 0 >= f ?
                                    i : h
                            }
                        }
                        if (b.resistance && "100%" == b.resistance && (
                            x.positions.current > 0 && (!b.freeMode ||
                                b.freeModeFluid) && (x.positions.current =
                                0), x.positions.current < -d() && (!
                                b.freeMode || b.freeModeFluid) && (
                                x.positions.current = -d())), !b.followFinger)
                            return;
                        return b.moveStartThreshold ? Math.abs(x.touches
                                .current - x.touches.start) > b.moveStartThreshold ||
                            O ? (O = !0, H ? x.setWrapperTranslate(x.positions
                                .current, 0, 0) : x.setWrapperTranslate(
                                0, x.positions.current, 0)) : x.positions
                            .current = x.positions.start : H ? x.setWrapperTranslate(
                                x.positions.current, 0, 0) : x.setWrapperTranslate(
                                0, x.positions.current, 0), (b.freeMode ||
                                b.watchActiveIndex) && x.updateActiveSlide(
                                x.positions.current), b.grabCursor && (
                                x.container.style.cursor = "move", x.container
                                .style.cursor = "grabbing", x.container
                                .style.cursor = "-moz-grabbin", x.container
                                .style.cursor = "-webkit-grabbing"), P ||
                            (P = x.touches.current), Q || (Q = (new Date)
                                .getTime()), x.velocity = (x.touches.current -
                                P) / ((new Date).getTime() - Q) / 2, 2 >
                            Math.abs(x.touches.current - P) && (x.velocity =
                                0), P = x.touches.current, Q = (new Date)
                            .getTime(), x.callPlugins("onTouchMoveEnd"),
                            b.onTouchMove && b.onTouchMove(x), !1
                    }
                }
            }

            function p() {
                if (C && x.swipeReset(), !b.onlyExternal && x.isTouched) {
                    x.isTouched = !1, b.grabCursor && (x.container.style
                            .cursor = "move", x.container.style.cursor =
                            "grab", x.container.style.cursor =
                            "-moz-grab", x.container.style.cursor =
                            "-webkit-grab"), x.positions.current || 0 ===
                        x.positions.current || (x.positions.current = x
                            .positions.start), b.followFinger && (H ? x
                            .setWrapperTranslate(x.positions.current, 0,
                                0) : x.setWrapperTranslate(0, x.positions
                                .current, 0)), x.times.end = (new Date)
                        .getTime(), x.touches.diff = x.touches.current -
                        x.touches.start, x.touches.abs = Math.abs(x.touches
                            .diff), x.positions.diff = x.positions.current -
                        x.positions.start, x.positions.abs = Math.abs(x
                            .positions.diff);
                    var a = x.positions.diff,
                        c = x.positions.abs,
                        e = x.times.end - x.times.start;
                    if (5 > c && 300 > e && 0 == x.allowLinks && (b.freeMode ||
                        0 == c || x.swipeReset(), b.preventLinks &&
                        (x.allowLinks = !0), b.onSlideClick && (x.allowSlideClick = !
                            0)), setTimeout(function() {
                        b.preventLinks && (x.allowLinks = !0),
                            b.onSlideClick && (x.allowSlideClick = !
                                0)
                    }, 100), !x.isMoved) return x.isMoved = !1, b.onTouchEnd &&
                        b.onTouchEnd(x), x.callPlugins("onTouchEnd"),
                        void 0;
                    x.isMoved = !1;
                    var f = d();
                    if (x.positions.current > 0) return x.swipeReset(),
                        b.onTouchEnd && b.onTouchEnd(x), x.callPlugins(
                            "onTouchEnd"), void 0;
                    if (-f > x.positions.current) return x.swipeReset(),
                        b.onTouchEnd && b.onTouchEnd(x), x.callPlugins(
                            "onTouchEnd"), void 0;
                    if (b.freeMode) {
                        if (b.freeModeFluid) {
                            var g, h = 1e3 * b.momentumRatio,
                                i = x.velocity * h,
                                j = x.positions.current + i,
                                k = !1,
                                l = 20 * Math.abs(x.velocity) * b.momentumBounceRatio; -
                            f > j && (b.momentumBounce && x.support.transitions ?
                                    (-l > j + f && (j = -f - l), g = -f,
                                        k = !0, S = !0) : j = -f), j >
                                0 && (b.momentumBounce && x.support.transitions ?
                                    (j > l && (j = l), g = 0, k = !0, S = !
                                        0) : j = 0), 0 != x.velocity &&
                                (h = Math.abs((j - x.positions.current) /
                                    x.velocity)), H ? x.setWrapperTranslate(
                                    j, 0, 0) : x.setWrapperTranslate(0,
                                    j, 0), x.setWrapperTransition(h), b
                                .momentumBounce && k && x.wrapperTransitionEnd(
                                    function() {
                                        S && (b.onMomentumBounce && b.onMomentumBounce(
                                            x), H ? x.setWrapperTranslate(
                                            g, 0, 0) : x.setWrapperTranslate(
                                            0, g, 0), x.setWrapperTransition(
                                            300))
                                    }), x.updateActiveSlide(j)
                        }
                        return (!b.freeModeFluid || e >= 300) && x.updateActiveSlide(
                                x.positions.current), b.onTouchEnd && b
                            .onTouchEnd(x), x.callPlugins("onTouchEnd"),
                            void 0
                    }
                    B = 0 > a ? "toNext" : "toPrev", "toNext" == B &&
                        300 >= e && (30 > c || !b.shortSwipes ? x.swipeReset() :
                            x.swipeNext(!0)), "toPrev" == B && 300 >= e &&
                        (30 > c || !b.shortSwipes ? x.swipeReset() : x.swipePrev(!
                            0));
                    var m = 0;
                    if ("auto" == b.slidesPerView) {
                        for (var n, o = Math.abs(H ? x.getWrapperTranslate(
                                "x") : x.getWrapperTranslate(
                                "y")), p = 0, q = 0; x.slides.length >
                            q; q++)
                            if (n = H ? x.slides[q].getWidth(!0) : x.slides[
                                q].getHeight(!0), p += n, p > o) {
                                m = n;
                                break
                            }
                        m > D && (m = D)
                    } else m = z * b.slidesPerView;
                    "toNext" == B && e > 300 && (c >= .5 * m ? x.swipeNext(!
                            0) : x.swipeReset()), "toPrev" == B && e >
                        300 && (c >= .5 * m ? x.swipePrev(!0) : x.swipeReset()),
                        b.onTouchEnd && b.onTouchEnd(x), x.callPlugins(
                            "onTouchEnd")
                }
            }

            function q(a, c, d) {
                function e() {
                    g += h, j = "toNext" == i ? g > a : a > g, j ?
                        (H ? x.setWrapperTranslate(Math.round(g), 0) :
                            x.setWrapperTranslate(0, Math.round(g)),
                            x._DOMAnimating = !0, window.setTimeout(
                                function() {
                                    e()
                                }, 1e3 / 60)) : (b.onSlideChangeEnd &&
                            b.onSlideChangeEnd(x), H ? x.setWrapperTranslate(
                                a, 0) : x.setWrapperTranslate(0, a),
                            x._DOMAnimating = !1)
                }
                if (x.support.transitions || !b.DOMAnimation) {
                    H ? x.setWrapperTranslate(a, 0, 0) : x.setWrapperTranslate(
                        0, a, 0);
                    var f = "to" == c && d.speed >= 0 ? d.speed : b.speed;
                    x.setWrapperTransition(f)
                } else {
                    var g = H ? x.getWrapperTranslate("x") : x.getWrapperTranslate(
                            "y"),
                        f = "to" == c && d.speed >= 0 ? d.speed : b.speed,
                        h = Math.ceil((a - g) / f * (1e3 / 60)),
                        i = g > a ? "toNext" : "toPrev",
                        j = "toNext" == i ? g > a : a > g;
                    if (x._DOMAnimating) return;
                    e()
                }
                x.updateActiveSlide(a), b.onSlideNext && "next" == c &&
                    b.onSlideNext(x, a), b.onSlidePrev && "prev" == c &&
                    b.onSlidePrev(x, a), b.onSlideReset && "reset" == c &&
                    b.onSlideReset(x, a), ("next" == c || "prev" == c ||
                        "to" == c && 1 == d.runCallbacks) && r()
            }

            function r() {
                if (x.callPlugins("onSlideChangeStart"), b.onSlideChangeStart)
                    if (b.queueStartCallbacks && x.support.transitions) {
                        if (x._queueStartCallbacks) return;
                        x._queueStartCallbacks = !0, b.onSlideChangeStart(
                            x), x.wrapperTransitionEnd(function() {
                            x._queueStartCallbacks = !1
                        })
                    } else b.onSlideChangeStart(x);
                if (b.onSlideChangeEnd)
                    if (x.support.transitions)
                        if (b.queueEndCallbacks) {
                            if (x._queueEndCallbacks) return;
                            x._queueEndCallbacks = !0, x.wrapperTransitionEnd(
                                b.onSlideChangeEnd)
                        } else x.wrapperTransitionEnd(b.onSlideChangeEnd);
                else b.DOMAnimation || setTimeout(function() {
                    b.onSlideChangeEnd(x)
                }, 10)
            }

            function s() {
                for (var a = x.paginationButtons, b = 0; a.length > b; b++)
                    x.h.removeEventListener(a[b], "click", u, !1)
            }

            function t() {
                for (var a = x.paginationButtons, b = 0; a.length > b; b++)
                    x.h.addEventListener(a[b], "click", u, !1)
            }

            function u(a) {
                for (var b, c = a.target || a.srcElement, d = x.paginationButtons,
                    e = 0; d.length > e; e++) c === d[e] && (b = e);
                x.swipeTo(b)
            }

            function v() {
                x.calcSlides(), b.loader.slides.length > 0 && 0 == x.slides
                    .length && x.loadSlides(), b.loop && x.createLoop(),
                    x.init(), e(), b.pagination && b.createPagination &&
                    x.createPagination(!0), b.loop || b.initialSlide >
                    0 ? x.swipeTo(b.initialSlide, 0, !1) : x.updateActiveSlide(
                        0), b.autoplay && x.startAutoplay()
            }
            if (document.body.__defineGetter__ && HTMLElement) {
                var w = HTMLElement.prototype;
                w.__defineGetter__ && w.__defineGetter__("outerHTML",
                    function() {
                        return (new XMLSerializer).serializeToString(
                            this)
                    })
            }
            if (window.getComputedStyle || (window.getComputedStyle =
                    function(a) {
                        return this.el = a, this.getPropertyValue =
                            function(b) {
                                var c = /(\-([a-z]){1})/g;
                                return "float" === b && (b = "styleFloat"),
                                    c.test(b) && (b = b.replace(c, function() {
                                        return arguments[2].toUpperCase()
                                    })), a.currentStyle[b] ? a.currentStyle[
                                        b] : null
                            }, this
                    }), Array.prototype.indexOf || (Array.prototype.indexOf =
                    function(a, b) {
                        for (var c = b || 0, d = this.length; d > c; c++)
                            if (this[c] === a) return c;
                        return -1
                    }), (document.querySelectorAll || window.jQuery) &&
                void 0 !== a && (a.nodeType || 0 !== c(a).length)) {
                var x = this;
                x.touches = {
                        start: 0,
                        startX: 0,
                        startY: 0,
                        current: 0,
                        currentX: 0,
                        currentY: 0,
                        diff: 0,
                        abs: 0
                    }, x.positions = {
                        start: 0,
                        abs: 0,
                        diff: 0,
                        current: 0
                    }, x.times = {
                        start: 0,
                        end: 0
                    }, x.id = (new Date).getTime(), x.container = a.nodeType ?
                    a : c(a)[0], x.isTouched = !1, x.isMoved = !1, x.activeIndex =
                    0, x.activeLoaderIndex = 0, x.activeLoopIndex = 0, x.previousIndex =
                    null, x.velocity = 0, x.snapGrid = [], x.slidesGrid = [],
                    x.imagesToLoad = [], x.imagesLoaded = 0, x.wrapperLeft =
                    0, x.wrapperRight = 0, x.wrapperTop = 0, x.wrapperBottom =
                    0;
                var y, z, A, B, C, D, E = {
                    mode: "horizontal",
                    touchRatio: 1,
                    speed: 300,
                    freeMode: !1,
                    freeModeFluid: !1,
                    momentumRatio: 1,
                    momentumBounce: !0,
                    momentumBounceRatio: 1,
                    slidesPerView: 1,
                    slidesPerGroup: 1,
                    simulateTouch: !0,
                    followFinger: !0,
                    shortSwipes: !0,
                    moveStartThreshold: !1,
                    autoplay: !1,
                    onlyExternal: !1,
                    createPagination: !0,
                    pagination: !1,
                    paginationElement: "span",
                    paginationClickable: !1,
                    paginationAsRange: !0,
                    resistance: !0,
                    scrollContainer: !1,
                    preventLinks: !0,
                    noSwiping: !1,
                    noSwipingClass: "swiper-no-swiping",
                    initialSlide: 0,
                    keyboardControl: !1,
                    mousewheelControl: !1,
                    useCSS3Transforms: !0,
                    loop: !1,
                    loopAdditionalSlides: 0,
                    calculateHeight: !1,
                    updateOnImagesReady: !0,
                    releaseFormElements: !0,
                    watchActiveIndex: !1,
                    visibilityFullFit: !1,
                    offsetPxBefore: 0,
                    offsetPxAfter: 0,
                    offsetSlidesBefore: 0,
                    offsetSlidesAfter: 0,
                    centeredSlides: !1,
                    queueStartCallbacks: !1,
                    queueEndCallbacks: !1,
                    autoResize: !0,
                    resizeReInit: !1,
                    DOMAnimation: !0,
                    loader: {
                        slides: [],
                        slidesHTMLType: "inner",
                        surroundGroups: 1,
                        logic: "reload",
                        loadAllSlides: !1
                    },
                    slideElement: "div",
                    slideClass: "swiper-slide",
                    slideActiveClass: "swiper-slide-active",
                    slideVisibleClass: "swiper-slide-visible",
                    wrapperClass: "swiper-wrapper",
                    paginationElementClass: "swiper-pagination-switch",
                    paginationActiveClass: "swiper-active-switch",
                    paginationVisibleClass: "swiper-visible-switch"
                };
                b = b || {};
                for (var F in E)
                    if (F in b && "object" == typeof b[F])
                        for (var G in E[F]) G in b[F] || (b[F][G] = E[F][G]);
                    else F in b || (b[F] = E[F]);
                x.params = b, b.scrollContainer && (b.freeMode = !0, b.freeModeFluid = !
                    0), b.loop && (b.resistance = "100%");
                var H = "horizontal" === b.mode;
                x.touchEvents = {
                    touchStart: x.support.touch || !b.simulateTouch ?
                        "touchstart" : x.browser.ie10 ? "MSPointerDown" : "mousedown",
                    touchMove: x.support.touch || !b.simulateTouch ?
                        "touchmove" : x.browser.ie10 ? "MSPointerMove" : "mousemove",
                    touchEnd: x.support.touch || !b.simulateTouch ?
                        "touchend" : x.browser.ie10 ? "MSPointerUp" : "mouseup"
                };
                for (var I = x.container.childNodes.length - 1; I >= 0; I--)
                    if (x.container.childNodes[I].className)
                        for (var J = x.container.childNodes[I].className.split(
                            " "), K = 0; J.length > K; K++) J[K] === b.wrapperClass &&
                            (y = x.container.childNodes[I]);
                x.wrapper = y, x._extendSwiperSlide = function(a) {
                    return a.append = function() {
                            return b.loop ? (a.insertAfter(x.slides.length -
                                        x.loopedSlides), x.removeLoopedSlides(),
                                    x.calcSlides(), x.createLoop()) : x
                                .wrapper.appendChild(a), x.reInit(), a
                        }, a.prepend = function() {
                            return b.loop ? (x.wrapper.insertBefore(a,
                                        x.slides[x.loopedSlides]), x.removeLoopedSlides(),
                                    x.calcSlides(), x.createLoop()) : x
                                .wrapper.insertBefore(a, x.wrapper.firstChild),
                                x.reInit(), a
                        }, a.insertAfter = function(c) {
                            if (void 0 === c) return !1;
                            var d;
                            return b.loop ? (d = x.slides[c + 1 + x.loopedSlides],
                                x.wrapper.insertBefore(a, d), x.removeLoopedSlides(),
                                x.calcSlides(), x.createLoop()) : (
                                d = x.slides[c + 1], x.wrapper.insertBefore(
                                    a, d)), x.reInit(), a
                        }, a.clone = function() {
                            return x._extendSwiperSlide(a.cloneNode(!0))
                        }, a.remove = function() {
                            x.wrapper.removeChild(a), x.reInit()
                        }, a.html = function(b) {
                            return void 0 === b ? a.innerHTML : (a.innerHTML =
                                b, a)
                        }, a.index = function() {
                            for (var b, c = x.slides.length - 1; c >= 0; c--)
                                a === x.slides[c] && (b = c);
                            return b
                        }, a.isActive = function() {
                            return a.index() === x.activeIndex ? !0 : !
                                1
                        }, a.swiperSlideDataStorage || (a.swiperSlideDataStorage = {}),
                        a.getData = function(b) {
                            return a.swiperSlideDataStorage[b]
                        }, a.setData = function(b, c) {
                            return a.swiperSlideDataStorage[b] = c, a
                        }, a.data = function(b, c) {
                            return c ? (a.setAttribute("data-" + b, c),
                                a) : a.getAttribute("data-" + b)
                        }, a.getWidth = function(b) {
                            return x.h.getWidth(a, b)
                        }, a.getHeight = function(b) {
                            return x.h.getHeight(a, b)
                        }, a.getOffset = function() {
                            return x.h.getOffset(a)
                        }, a
                }, x.calcSlides = function(a) {
                    var c = x.slides ? x.slides.length : !1;
                    x.slides = [], x.displaySlides = [];
                    for (var d = 0; x.wrapper.childNodes.length > d; d++)
                        if (x.wrapper.childNodes[d].className)
                            for (var e = x.wrapper.childNodes[d].className,
                                    h = e.split(" "), i = 0; h.length >
                                i; i++) h[i] === b.slideClass && x.slides
                                .push(x.wrapper.childNodes[d]);
                    for (d = x.slides.length - 1; d >= 0; d--) x._extendSwiperSlide(
                        x.slides[d]);
                    c && (c !== x.slides.length || a) && (g(), f(), x.updateActiveSlide(),
                        b.createPagination && x.params.pagination &&
                        x.createPagination(), x.callPlugins(
                            "numberOfSlidesChanged"))
                }, x.createSlide = function(a, c, d) {
                    var c = c || x.params.slideClass,
                        d = d || b.slideElement,
                        e = document.createElement(d);
                    return e.innerHTML = a || "", e.className = c, x._extendSwiperSlide(
                        e)
                }, x.appendSlide = function(a, b, c) {
                    return a ? a.nodeType ? x._extendSwiperSlide(a).append() :
                        x.createSlide(a, b, c).append() : void 0
                }, x.prependSlide = function(a, b, c) {
                    return a ? a.nodeType ? x._extendSwiperSlide(a).prepend() :
                        x.createSlide(a, b, c).prepend() : void 0
                }, x.insertSlideAfter = function(a, b, c, d) {
                    return void 0 === a ? !1 : b.nodeType ? x._extendSwiperSlide(
                        b).insertAfter(a) : x.createSlide(b, c, d).insertAfter(
                        a)
                }, x.removeSlide = function(a) {
                    if (x.slides[a]) {
                        if (b.loop) {
                            if (!x.slides[a + x.loopedSlides]) return !
                                1;
                            x.slides[a + x.loopedSlides].remove(), x.removeLoopedSlides(),
                                x.calcSlides(), x.createLoop()
                        } else x.slides[a].remove();
                        return !0
                    }
                    return !1
                }, x.removeLastSlide = function() {
                    return x.slides.length > 0 ? (b.loop ? (x.slides[x.slides
                            .length - 1 - x.loopedSlides].remove(),
                        x.removeLoopedSlides(), x.calcSlides(),
                        x.createLoop()) : x.slides[x.slides.length -
                        1].remove(), !0) : !1
                }, x.removeAllSlides = function() {
                    for (var a = x.slides.length - 1; a >= 0; a--) x.slides[
                        a].remove()
                }, x.getSlide = function(a) {
                    return x.slides[a]
                }, x.getLastSlide = function() {
                    return x.slides[x.slides.length - 1]
                }, x.getFirstSlide = function() {
                    return x.slides[0]
                }, x.activeSlide = function() {
                    return x.slides[x.activeIndex]
                };
                var L = [];
                for (var M in x.plugins)
                    if (b[M]) {
                        var N = x.plugins[M](x, b[M]);
                        N && L.push(N)
                    }
                x.callPlugins = function(a, b) {
                        b || (b = {});
                        for (var c = 0; L.length > c; c++) a in L[c] && L[c]
                            [a](b)
                    }, x.browser.ie10 && !b.onlyExternal && (H ? x.wrapper.classList
                        .add("swiper-wp8-horizontal") : x.wrapper.classList
                        .add("swiper-wp8-vertical")), b.freeMode && (x.container
                        .className += " swiper-free-mode"), x.initialized = !
                    1, x.init = function(a, c) {
                        var d = x.h.getWidth(x.container),
                            e = x.h.getHeight(x.container);
                        if (d !== x.width || e !== x.height || a) {
                            x.width = d, x.height = e, D = H ? d : e;
                            var f = x.wrapper;
                            if (a && x.calcSlides(c), "auto" === b.slidesPerView) {
                                var g = 0,
                                    h = 0;
                                b.slidesOffset > 0 && (f.style.paddingLeft =
                                        "", f.style.paddingRight = "", f.style
                                        .paddingTop = "", f.style.paddingBottom =
                                        ""), f.style.width = "", f.style.height =
                                    "", b.offsetPxBefore > 0 && (H ? x.wrapperLeft =
                                        b.offsetPxBefore : x.wrapperTop = b
                                        .offsetPxBefore), b.offsetPxAfter >
                                    0 && (H ? x.wrapperRight = b.offsetPxAfter :
                                        x.wrapperBottom = b.offsetPxAfter),
                                    b.centeredSlides && (H ? (x.wrapperLeft =
                                        (D - this.slides[0].getWidth(!0)) /
                                        2, x.wrapperRight = (D - x.slides[
                                            x.slides.length - 1].getWidth(!
                                            0)) / 2) : (x.wrapperTop =
                                        (D - x.slides[0].getHeight(!0)) /
                                        2, x.wrapperBottom = (D - x.slides[
                                            x.slides.length - 1].getHeight(!
                                            0)) / 2)), H ? (x.wrapperLeft >=
                                        0 && (f.style.paddingLeft = x.wrapperLeft +
                                            "px"), x.wrapperRight >= 0 && (
                                            f.style.paddingRight = x.wrapperRight +
                                            "px")) : (x.wrapperTop >= 0 &&
                                        (f.style.paddingTop = x.wrapperTop +
                                            "px"), x.wrapperBottom >= 0 &&
                                        (f.style.paddingBottom = x.wrapperBottom +
                                            "px"));
                                var i = 0,
                                    j = 0;
                                x.snapGrid = [], x.slidesGrid = [];
                                for (var k = 0, l = 0; x.slides.length > l; l++) {
                                    var m = x.slides[l].getWidth(!0),
                                        n = x.slides[l].getHeight(!0);
                                    b.calculateHeight && (k = Math.max(k, n));
                                    var o = H ? m : n;
                                    if (b.centeredSlides) {
                                        var p = l === x.slides.length - 1 ?
                                            0 : x.slides[l + 1].getWidth(!0),
                                            q = l === x.slides.length - 1 ?
                                            0 : x.slides[l + 1].getHeight(!
                                                0),
                                            r = H ? p : q;
                                        if (o > D) {
                                            for (var s = 0; Math.floor(o /
                                                    (D + x.wrapperLeft)) >=
                                                s; s++) 0 === s ? x.snapGrid
                                                .push(i + x.wrapperLeft) :
                                                x.snapGrid.push(i + x.wrapperLeft +
                                                    D * s);
                                            x.slidesGrid.push(i + x.wrapperLeft)
                                        } else x.snapGrid.push(j), x.slidesGrid
                                            .push(j);
                                        j += o / 2 + r / 2
                                    } else {
                                        if (o > D)
                                            for (var s = 0; Math.floor(o /
                                                D) >= s; s++) x.snapGrid.push(
                                                i + D * s);
                                        else x.snapGrid.push(i);
                                        x.slidesGrid.push(i)
                                    }
                                    i += o, g += m, h += n
                                }
                                b.calculateHeight && (x.height = k), H ? (A =
                                    g + x.wrapperRight + x.wrapperLeft,
                                    f.style.width = g + "px", f.style.height =
                                    x.height + "px") : (A = h + x.wrapperTop +
                                    x.wrapperBottom, f.style.width = x.width +
                                    "px", f.style.height = h + "px")
                            } else if (b.scrollContainer) {
                                f.style.width = "", f.style.height = "";
                                var t = x.slides[0].getWidth(!0),
                                    u = x.slides[0].getHeight(!0);
                                A = H ? t : u, f.style.width = t + "px", f.style
                                    .height = u + "px", z = H ? t : u
                            } else {
                                if (b.calculateHeight) {
                                    var k = 0,
                                        u = 0;
                                    H || (x.container.style.height = ""), f
                                        .style.height = "";
                                    for (var l = 0; x.slides.length > l; l++)
                                        x.slides[l].style.height = "", k =
                                        Math.max(x.slides[l].getHeight(!0),
                                            k), H || (u += x.slides[l].getHeight(!
                                            0));
                                    var n = k;
                                    if (H) var u = n;
                                    D = x.height = n, H || (x.container.style
                                        .height = D + "px")
                                } else var n = H ? x.height : x.height / b.slidesPerView,
                                    u = H ? x.height : x.slides.length *
                                    n;
                                var m = H ? x.width / b.slidesPerView : x.width,
                                    t = H ? x.slides.length * m : x.width;
                                z = H ? m : n, b.offsetSlidesBefore > 0 &&
                                    (H ? x.wrapperLeft = z * b.offsetSlidesBefore :
                                        x.wrapperTop = z * b.offsetSlidesBefore
                                    ), b.offsetSlidesAfter > 0 && (H ? x.wrapperRight =
                                        z * b.offsetSlidesAfter : x.wrapperBottom =
                                        z * b.offsetSlidesAfter), b.offsetPxBefore >
                                    0 && (H ? x.wrapperLeft = b.offsetPxBefore :
                                        x.wrapperTop = b.offsetPxBefore), b
                                    .offsetPxAfter > 0 && (H ? x.wrapperRight =
                                        b.offsetPxAfter : x.wrapperBottom =
                                        b.offsetPxAfter), b.centeredSlides &&
                                    (H ? (x.wrapperLeft = (D - z) / 2, x.wrapperRight =
                                        (D - z) / 2) : (x.wrapperTop =
                                        (D - z) / 2, x.wrapperBottom =
                                        (D - z) / 2)), H ? (x.wrapperLeft >
                                        0 && (f.style.paddingLeft = x.wrapperLeft +
                                            "px"), x.wrapperRight > 0 && (f
                                            .style.paddingRight = x.wrapperRight +
                                            "px")) : (x.wrapperTop > 0 && (
                                        f.style.paddingTop = x.wrapperTop +
                                        "px"), x.wrapperBottom > 0 && (
                                        f.style.paddingBottom = x.wrapperBottom +
                                        "px")), A = H ? t + x.wrapperRight +
                                    x.wrapperLeft : u + x.wrapperTop + x.wrapperBottom,
                                    f.style.width = t + "px", f.style.height =
                                    u + "px";
                                var i = 0;
                                x.snapGrid = [], x.slidesGrid = [];
                                for (var l = 0; x.slides.length > l; l++) x
                                    .snapGrid.push(i), x.slidesGrid.push(i),
                                    i += z, x.slides[l].style.width = m +
                                    "px", x.slides[l].style.height = n +
                                    "px"
                            }
                            x.initialized ? x.callPlugins("onInit") : x.callPlugins(
                                "onFirstInit"), x.initialized = !0
                        }
                    }, x.reInit = function(a) {
                        x.init(!0, a)
                    }, x.resizeFix = function(a) {
                        if (x.callPlugins("beforeResizeFix"), x.init(b.resizeReInit ||
                            a), b.freeMode) {
                            var c = H ? x.getWrapperTranslate("x") : x.getWrapperTranslate(
                                "y");
                            if (-d() > c) {
                                var e = H ? -d() : 0,
                                    f = H ? 0 : -d();
                                x.setWrapperTransition(0), x.setWrapperTranslate(
                                    e, f, 0)
                            }
                        } else b.loop ? x.swipeTo(x.activeLoopIndex, 0, !1) :
                            x.swipeTo(x.activeIndex, 0, !1);
                        x.callPlugins("afterResizeFix")
                    }, x.destroy = function() {
                        x.browser.ie10 ? (x.h.removeEventListener(x.wrapper,
                                x.touchEvents.touchStart, n, !1), x.h.removeEventListener(
                                document, x.touchEvents.touchMove, o, !
                                1), x.h.removeEventListener(document, x
                                .touchEvents.touchEnd, p, !1)) : (x.support
                                .touch && (x.h.removeEventListener(x.wrapper,
                                        "touchstart", n, !1), x.h.removeEventListener(
                                        x.wrapper, "touchmove", o, !1), x.h
                                    .removeEventListener(x.wrapper,
                                        "touchend", p, !1)), b.simulateTouch &&
                                (x.h.removeEventListener(x.wrapper,
                                    "mousedown", n, !1), x.h.removeEventListener(
                                    document, "mousemove", o, !1), x.h.removeEventListener(
                                    document, "mouseup", p, !1))), b.autoResize &&
                            x.h.removeEventListener(window, "resize", x.resizeFix, !
                                1), g(), b.paginationClickable && s(), b.mousewheelControl &&
                            x._wheelEvent && x.h.removeEventListener(x.container,
                                x._wheelEvent, i, !1), b.keyboardControl &&
                            x.h.removeEventListener(document, "keydown", h, !
                                1), b.autoplay && x.stopAutoplay(), x.callPlugins(
                                "onDestroy")
                    }, b.grabCursor && (x.container.style.cursor = "move",
                        x.container.style.cursor = "grab", x.container.style
                        .cursor = "-moz-grab", x.container.style.cursor =
                        "-webkit-grab"), x.allowSlideClick = !0, x.allowLinks = !
                    0;
                var O, P, Q, R = !1,
                    S = !0;
                x.swipeNext = function(a) {
                        !a && b.loop && x.fixLoop(), x.callPlugins(
                            "onSwipeNext");
                        var c = H ? x.getWrapperTranslate("x") : x.getWrapperTranslate(
                                "y"),
                            e = c;
                        if ("auto" == b.slidesPerView) {
                            for (var f = 0; x.snapGrid.length > f; f++)
                                if (-c >= x.snapGrid[f] && x.snapGrid[f + 1] >
                                    -c) {
                                    e = -x.snapGrid[f + 1];
                                    break
                                }
                        } else {
                            var g = z * b.slidesPerGroup;
                            e = -(Math.floor(Math.abs(c) / Math.floor(g)) *
                                g + g)
                        }
                        return -d() > e && (e = -d()), e == c ? !1 : (q(e,
                            "next"), !0)
                    }, x.swipePrev = function(a) {
                        !a && b.loop && x.fixLoop(), !a && b.autoplay && x.stopAutoplay(),
                            x.callPlugins("onSwipePrev");
                        var c, d = Math.ceil(H ? x.getWrapperTranslate("x") :
                            x.getWrapperTranslate("y"));
                        if ("auto" == b.slidesPerView) {
                            c = 0;
                            for (var e = 1; x.snapGrid.length > e; e++) {
                                if (-d == x.snapGrid[e]) {
                                    c = -x.snapGrid[e - 1];
                                    break
                                }
                                if (-d > x.snapGrid[e] && x.snapGrid[e + 1] >
                                    -d) {
                                    c = -x.snapGrid[e];
                                    break
                                }
                            }
                        } else {
                            var f = z * b.slidesPerGroup;
                            c = -(Math.ceil(-d / f) - 1) * f
                        }
                        return c > 0 && (c = 0), c == d ? !1 : (q(c, "prev"), !
                            0)
                    }, x.swipeReset = function() {
                        x.callPlugins("onSwipeReset");
                        var a, c = H ? x.getWrapperTranslate("x") : x.getWrapperTranslate(
                                "y"),
                            e = z * b.slidesPerGroup;
                        if (-d(), "auto" == b.slidesPerView) {
                            a = 0;
                            for (var f = 0; x.snapGrid.length > f; f++) {
                                if (-c === x.snapGrid[f]) return;
                                if (-c >= x.snapGrid[f] && x.snapGrid[f + 1] >
                                    -c) {
                                    a = x.positions.diff > 0 ? -x.snapGrid[
                                        f + 1] : -x.snapGrid[f];
                                    break
                                }
                            } - c >= x.snapGrid[x.snapGrid.length - 1] && (
                                    a = -x.snapGrid[x.snapGrid.length - 1]), -
                                d() >= c && (a = -d())
                        } else a = 0 > c ? Math.round(c / e) * e : 0;
                        return b.scrollContainer && (a = 0 > c ? c : 0), -d() >
                            a && (a = -d()), b.scrollContainer && D > z &&
                            (a = 0), a == c ? !1 : (q(a, "reset"), !0)
                    }, x.swipeTo = function(a, c, e) {
                        a = parseInt(a, 10), x.callPlugins("onSwipeTo", {
                            index: a,
                            speed: c
                        }), b.loop && (a += x.loopedSlides);
                        var f = H ? x.getWrapperTranslate("x") : x.getWrapperTranslate(
                            "y");
                        if (!(a > x.slides.length - 1 || 0 > a)) {
                            var g;
                            return g = "auto" == b.slidesPerView ? -x.slidesGrid[
                                    a] : -a * z, -d() > g && (g = -d()), g ==
                                f ? !1 : (e = e === !1 ? !1 : !0, q(g, "to", {
                                    index: a,
                                    speed: c,
                                    runCallbacks: e
                                }), !0)
                        }
                    }, x._queueStartCallbacks = !1, x._queueEndCallbacks = !
                    1, x.updateActiveSlide = function(a) {
                        if (x.initialized && 0 != x.slides.length) {
                            if (x.previousIndex = x.activeIndex, a > 0 && (
                                    a = 0), void 0 === a && (a = H ? x.getWrapperTranslate(
                                    "x") : x.getWrapperTranslate("y")),
                                "auto" == b.slidesPerView) {
                                if (x.activeIndex = x.slidesGrid.indexOf(-a),
                                    0 > x.activeIndex) {
                                    for (var c = 0; x.slidesGrid.length - 1 >
                                        c && !(-a > x.slidesGrid[c] && x.slidesGrid[
                                            c + 1] > -a); c++);
                                    var d = Math.abs(x.slidesGrid[c] + a),
                                        e = Math.abs(x.slidesGrid[c + 1] +
                                            a);
                                    x.activeIndex = e >= d ? c : c + 1
                                }
                            } else x.activeIndex = b.visibilityFullFit ?
                                Math.ceil(-a / z) : Math.round(-a / z); if (
                                x.activeIndex == x.slides.length && (x.activeIndex =
                                    x.slides.length - 1), 0 > x.activeIndex &&
                                (x.activeIndex = 0), x.slides[x.activeIndex]
                            ) {
                                x.calcVisibleSlides(a);
                                for (var f = RegExp("\\s*" + b.slideActiveClass),
                                    g = RegExp("\\s*" + b.slideVisibleClass),
                                    c = 0; x.slides.length > c; c++) x.slides[
                                        c].className = x.slides[c].className
                                    .replace(f, "").replace(g, ""), x.visibleSlides
                                    .indexOf(x.slides[c]) >= 0 && (x.slides[
                                        c].className += " " + b.slideVisibleClass);
                                if (x.slides[x.activeIndex].className +=
                                    " " + b.slideActiveClass, b.loop) {
                                    var h = x.loopedSlides;
                                    x.activeLoopIndex = x.activeIndex - h,
                                        x.activeLoopIndex >= x.slides.length -
                                        2 * h && (x.activeLoopIndex = x.slides
                                            .length - 2 * h - x.activeLoopIndex
                                        ), 0 > x.activeLoopIndex && (x.activeLoopIndex =
                                            x.slides.length - 2 * h + x.activeLoopIndex
                                        )
                                } else x.activeLoopIndex = x.activeIndex;
                                b.pagination && x.updatePagination(a)
                            }
                        }
                    }, x.createPagination = function(a) {
                        b.paginationClickable && x.paginationButtons && s();
                        var d = "",
                            e = x.slides.length,
                            f = e;
                        b.loop && (f -= 2 * x.loopedSlides);
                        for (var g = 0; f > g; g++) d += "<" + b.paginationElement +
                            ' class="' + b.paginationElementClass + '"></' +
                            b.paginationElement + ">";
                        x.paginationContainer = b.pagination.nodeType ? b.pagination :
                            c(b.pagination)[0], x.paginationContainer.innerHTML =
                            d, x.paginationButtons = [], document.querySelectorAll ?
                            x.paginationButtons = x.paginationContainer.querySelectorAll(
                                "." + b.paginationElementClass) : window.jQuery &&
                            (x.paginationButtons = c(x.paginationContainer)
                                .find("." + b.paginationElementClass)), a ||
                            x.updatePagination(), x.callPlugins(
                                "onCreatePagination"), b.paginationClickable &&
                            t()
                    }, x.updatePagination = function(a) {
                        if (!(1 > x.slides.length)) {
                            if (document.querySelectorAll) var d = x.paginationContainer
                                .querySelectorAll("." + b.paginationActiveClass);
                            else if (window.jQuery) var d = c(x.paginationContainer)
                                .find("." + b.paginationActiveClass);
                            if (d) {
                                for (var e = x.paginationButtons, f = 0; e.length >
                                    f; f++) e[f].className = b.paginationElementClass;
                                var g = b.loop ? x.loopedSlides : 0;
                                if (b.paginationAsRange) {
                                    x.visibleSlides || x.calcVisibleSlides(
                                        a);
                                    for (var h = [], f = 0; x.visibleSlides
                                        .length > f; f++) {
                                        var i = x.slides.indexOf(x.visibleSlides[
                                            f]) - g;
                                        b.loop && 0 > i && (i = x.slides.length -
                                                2 * x.loopedSlides + i), b.loop &&
                                            i >= x.slides.length - 2 * x.loopedSlides &&
                                            (i = x.slides.length - 2 * x.loopedSlides -
                                                i, i = Math.abs(i)), h.push(
                                                i)
                                    }
                                    for (f = 0; h.length > f; f++) e[h[f]] &&
                                        (e[h[f]].className += " " + b.paginationVisibleClass);
                                    b.loop ? e[x.activeLoopIndex].className +=
                                        " " + b.paginationActiveClass : e[x
                                            .activeIndex].className += " " +
                                        b.paginationActiveClass
                                } else b.loop ? e[x.activeLoopIndex].className +=
                                    " " + b.paginationActiveClass + " " + b
                                    .paginationVisibleClass : e[x.activeIndex]
                                    .className += " " + b.paginationActiveClass +
                                    " " + b.paginationVisibleClass
                            }
                        }
                    }, x.calcVisibleSlides = function(a) {
                        var c = [],
                            d = 0,
                            e = 0,
                            f = 0;
                        H && x.wrapperLeft > 0 && (a += x.wrapperLeft), !H &&
                            x.wrapperTop > 0 && (a += x.wrapperTop);
                        for (var g = 0; x.slides.length > g; g++) {
                            d += e, e = "auto" == b.slidesPerView ? H ? x.h
                                .getWidth(x.slides[g], !0) : x.h.getHeight(
                                    x.slides[g], !0) : z, f = d + e;
                            var h = !1;
                            b.visibilityFullFit ? (d >= -a && -a + D >= f &&
                                    (h = !0), -a >= d && f >= -a + D && (h = !
                                        0)) : (f > -a && -a + D >= f && (h = !
                                    0), d >= -a && -a + D > d && (h = !
                                    0), -a > d && f > -a + D && (h = !0)),
                                h && c.push(x.slides[g])
                        }
                        0 == c.length && (c = [x.slides[x.activeIndex]]), x
                            .visibleSlides = c
                    };
                var T = void 0;
                x.startAutoplay = function() {
                    return void 0 !== T ? !1 : (b.autoplay && !b.loop &&
                        (T = setInterval(function() {
                            x.swipeNext(!0) || x.swipeTo(0)
                        }, b.autoplay)), b.autoplay && b.loop && (
                            autoPlay = setInterval(function() {
                                x.swipeNext()
                            }, b.autoplay)), x.callPlugins(
                            "onAutoplayStart"), void 0)
                }, x.stopAutoplay = function() {
                    T && clearInterval(T), T = void 0, x.callPlugins(
                        "onAutoplayStop")
                }, x.loopCreated = !1, x.removeLoopedSlides = function() {
                    if (x.loopCreated)
                        for (var a = 0; x.slides.length > a; a++) x.slides[
                                a].getData("looped") === !0 && x.wrapper
                            .removeChild(x.slides[a])
                }, x.createLoop = function() {
                    if (0 != x.slides.length) {
                        x.loopedSlides = b.slidesPerView + b.loopAdditionalSlides;
                        for (var a = "", c = "", d = 0; x.loopedSlides >
                            d; d++) a += x.slides[d].outerHTML;
                        for (d = x.slides.length - x.loopedSlides; x.slides
                            .length > d; d++) c += x.slides[d].outerHTML;
                        for (y.innerHTML = c + y.innerHTML + a, x.loopCreated = !
                            0, x.calcSlides(), d = 0; x.slides.length >
                            d; d++)(x.loopedSlides > d || d >= x.slides
                                .length - x.loopedSlides) && x.slides[d]
                            .setData("looped", !0);
                        x.callPlugins("onCreateLoop")
                    }
                }, x.fixLoop = function() {
                    if (x.activeIndex < x.loopedSlides) {
                        var a = x.slides.length - 3 * x.loopedSlides +
                            x.activeIndex;
                        x.swipeTo(a, 0, !1)
                    } else if (x.activeIndex > x.slides.length - 2 * b.slidesPerView) {
                        var a = -x.slides.length + x.activeIndex + x.loopedSlides;
                        x.swipeTo(a, 0, !1)
                    }
                }, x.loadSlides = function() {
                    var a = "";
                    x.activeLoaderIndex = 0;
                    for (var c = b.loader.slides, d = b.loader.loadAllSlides ?
                        c.length : b.slidesPerView * (1 + b.loader.surroundGroups),
                        e = 0; d > e; e++) a += "outer" == b.loader.slidesHTMLType ?
                        c[e] : "<" + b.slideElement + ' class="' + b.slideClass +
                        '" data-swiperindex="' + e + '">' + c[e] + "</" +
                        b.slideElement + ">";
                    x.wrapper.innerHTML = a, x.calcSlides(!0), b.loader
                        .loadAllSlides || x.wrapperTransitionEnd(x.reloadSlides, !
                            0)
                }, x.reloadSlides = function() {
                    var a = b.loader.slides,
                        c = parseInt(x.activeSlide().data("swiperindex"),
                            10);
                    if (!(0 > c || c > a.length - 1)) {
                        x.activeLoaderIndex = c;
                        var d = Math.max(0, c - b.slidesPerView * b.loader
                                .surroundGroups),
                            e = Math.min(c + b.slidesPerView * (1 + b.loader
                                .surroundGroups) - 1, a.length - 1);
                        if (c > 0) {
                            var f = -z * (c - d);
                            H ? x.setWrapperTranslate(f, 0, 0) : x.setWrapperTranslate(
                                0, f, 0), x.setWrapperTransition(0)
                        }
                        if ("reload" === b.loader.logic) {
                            x.wrapper.innerHTML = "";
                            for (var g = "", h = d; e >= h; h++) g +=
                                "outer" == b.loader.slidesHTMLType ? a[
                                    h] : "<" + b.slideElement +
                                ' class="' + b.slideClass +
                                '" data-swiperindex="' + h + '">' + a[h] +
                                "</" + b.slideElement + ">";
                            x.wrapper.innerHTML = g
                        } else {
                            for (var i = 1e3, j = 0, h = 0; x.slides.length >
                                h; h++) {
                                var k = x.slides[h].data("swiperindex");
                                d > k || k > e ? x.wrapper.removeChild(
                                    x.slides[h]) : (i = Math.min(k,
                                    i), j = Math.max(k, j))
                            }
                            for (var h = d; e >= h; h++) {
                                if (i > h) {
                                    var l = document.createElement(b.slideElement);
                                    l.className = b.slideClass, l.setAttribute(
                                            "data-swiperindex", h), l.innerHTML =
                                        a[h], x.wrapper.insertBefore(l,
                                            x.wrapper.firstChild)
                                }
                                if (h > j) {
                                    var l = document.createElement(b.slideElement);
                                    l.className = b.slideClass, l.setAttribute(
                                            "data-swiperindex", h), l.innerHTML =
                                        a[h], x.wrapper.appendChild(l)
                                }
                            }
                        }
                        x.reInit(!0)
                    }
                }, v()
            }
        };
    i.prototype = {
        plugins: {},
        wrapperTransitionEnd: function(a, b) {
            function c() {
                if (a(d), d.params.queueEndCallbacks && (d._queueEndCallbacks = !
                    1), !b)
                    for (var g = 0; f.length > g; g++) e.removeEventListener(
                        f[g], c, !1)
            }
            var d = this,
                e = d.wrapper,
                f = ["webkitTransitionEnd", "transitionend",
                    "oTransitionEnd", "MSTransitionEnd",
                    "msTransitionEnd"
                ];
            if (a)
                for (var g = 0; f.length > g; g++) e.addEventListener(
                    f[g], c, !1)
        },
        getWrapperTranslate: function(a) {
            var b, c, d = this.wrapper;
            if (window.WebKitCSSMatrix) {
                var e = new WebKitCSSMatrix(window.getComputedStyle(
                    d, null).webkitTransform);
                b = ("" + e).split(",")
            } else {
                var e = window.getComputedStyle(d, null).MozTransform ||
                    window.getComputedStyle(d, null).OTransform ||
                    window.getComputedStyle(d, null).MsTransform ||
                    window.getComputedStyle(d, null).msTransform ||
                    window.getComputedStyle(d, null).transform ||
                    window.getComputedStyle(d, null).getPropertyValue(
                        "transform").replace("translate(",
                        "matrix(1, 0, 0, 1,");
                b = ("" + e).split(",")
            }
            return this.params.useCSS3Transforms ? ("x" == a && (c =
                    16 == b.length ? parseFloat(b[12]) : window
                    .WebKitCSSMatrix ? e.m41 : parseFloat(b[4])
                ), "y" == a && (c = 16 == b.length ? parseFloat(
                        b[13]) : window.WebKitCSSMatrix ? e.m42 :
                    parseFloat(b[5]))) : ("x" == a && (c =
                        parseFloat(d.style.left, 10) || 0), "y" ==
                    a && (c = parseFloat(d.style.top, 10) || 0)), c ||
                0
        },
        setWrapperTranslate: function(a, b, c) {
            var d = this.wrapper.style;
            a = a || 0, b = b || 0, c = c || 0, this.params.useCSS3Transforms ?
                this.support.transforms3d ? d.webkitTransform = d.MsTransform =
                d.msTransform = d.MozTransform = d.OTransform = d.transform =
                "translate3d(" + a + "px, " + b + "px, " + c +
                "px)" : (d.webkitTransform = d.MsTransform = d.msTransform =
                    d.MozTransform = d.OTransform = d.transform =
                    "translate(" + a + "px, " + b + "px)", this.support
                    .transforms || (d.left = a + "px", d.top = b +
                        "px")) : (d.left = a + "px", d.top = b +
                    "px"), this.callPlugins("onSetWrapperTransform", {
                    x: a,
                    y: b,
                    z: c
                })
        },
        setWrapperTransition: function(a) {
            var b = this.wrapper.style;
            b.webkitTransitionDuration = b.MsTransitionDuration = b
                .msTransitionDuration = b.MozTransitionDuration = b
                .OTransitionDuration = b.transitionDuration = a /
                1e3 + "s", this.callPlugins(
                    "onSetWrapperTransition", {
                        duration: a
                    })
        },
        h: {
            getWidth: function(a, b) {
                var c = window.getComputedStyle(a, null).getPropertyValue(
                        "width"),
                    d = parseFloat(c);
                return (isNaN(d) || c.indexOf("%") > 0) && (d = a.offsetWidth -
                        parseFloat(window.getComputedStyle(a, null)
                            .getPropertyValue("padding-left")) -
                        parseFloat(window.getComputedStyle(a, null)
                            .getPropertyValue("padding-right"))), b &&
                    (d += parseFloat(window.getComputedStyle(a,
                        null).getPropertyValue(
                        "padding-left")) + parseFloat(window.getComputedStyle(
                        a, null).getPropertyValue(
                        "padding-right"))), d
            },
            getHeight: function(a, b) {
                if (b) return a.offsetHeight;
                var c = window.getComputedStyle(a, null).getPropertyValue(
                        "height"),
                    d = parseFloat(c);
                return (isNaN(d) || c.indexOf("%") > 0) && (d = a.offsetHeight -
                        parseFloat(window.getComputedStyle(a, null)
                            .getPropertyValue("padding-top")) -
                        parseFloat(window.getComputedStyle(a, null)
                            .getPropertyValue("padding-bottom"))),
                    b && (d += parseFloat(window.getComputedStyle(a,
                        null).getPropertyValue(
                        "padding-top")) + parseFloat(window.getComputedStyle(
                        a, null).getPropertyValue(
                        "padding-bottom"))), d
            },
            getOffset: function(a) {
                var b = a.getBoundingClientRect(),
                    c = document.body,
                    d = a.clientTop || c.clientTop || 0,
                    e = a.clientLeft || c.clientLeft || 0,
                    f = window.pageYOffset || a.scrollTop,
                    g = window.pageXOffset || a.scrollLeft;
                return document.documentElement && !window.pageYOffset &&
                    (f = document.documentElement.scrollTop, g =
                        document.documentElement.scrollLeft), {
                        top: b.top + f - d,
                        left: b.left + g - e
                    }
            },
            windowWidth: function() {
                return window.innerWidth ? window.innerWidth :
                    document.documentElement && document.documentElement
                    .clientWidth ? document.documentElement.clientWidth :
                    void 0
            },
            windowHeight: function() {
                return window.innerHeight ? window.innerHeight :
                    document.documentElement && document.documentElement
                    .clientHeight ? document.documentElement.clientHeight :
                    void 0
            },
            windowScroll: function() {
                return "undefined" != typeof pageYOffset ? {
                    left: window.pageXOffset,
                    top: window.pageYOffset
                } : document.documentElement ? {
                    left: document.documentElement.scrollLeft,
                    top: document.documentElement.scrollTop
                } : void 0
            },
            addEventListener: function(a, b, c, d) {
                a.addEventListener ? a.addEventListener(b, c, d) :
                    a.attachEvent && a.attachEvent("on" + b, c)
            },
            removeEventListener: function(a, b, c, d) {
                a.removeEventListener ? a.removeEventListener(b, c,
                    d) : a.detachEvent && a.detachEvent("on" +
                    b, c)
            }
        },
        setTransform: function(a, b) {
            var c = a.style;
            c.webkitTransform = c.MsTransform = c.msTransform = c.MozTransform =
                c.OTransform = c.transform = b
        },
        setTranslate: function(a, b) {
            var c = a.style,
                d = {
                    x: b.x || 0,
                    y: b.y || 0,
                    z: b.z || 0
                },
                e = this.support.transforms3d ? "translate3d(" + d.x +
                "px," + d.y + "px," + d.z + "px)" : "translate(" +
                d.x + "px," + d.y + "px)";
            c.webkitTransform = c.MsTransform = c.msTransform = c.MozTransform =
                c.OTransform = c.transform = e, this.support.transforms ||
                (c.left = d.x + "px", c.top = d.y + "px")
        },
        setTransition: function(a, b) {
            var c = a.style;
            c.webkitTransitionDuration = c.MsTransitionDuration = c
                .msTransitionDuration = c.MozTransitionDuration = c
                .OTransitionDuration = c.transitionDuration = b +
                "ms"
        },
        support: {
            touch: window.Modernizr && Modernizr.touch === !0 ||
                function() {
                    return !!("ontouchstart" in window || window.DocumentTouch &&
                        document instanceof DocumentTouch)
                }(),
            transforms3d: window.Modernizr && Modernizr.csstransforms3d ===
                !0 || function() {
                    var a = document.createElement("div");
                    return "webkitPerspective" in a.style ||
                        "MozPerspective" in a.style || "OPerspective" in
                        a.style || "MsPerspective" in a.style ||
                        "perspective" in a.style
                }(),
            transforms: window.Modernizr && Modernizr.csstransforms ===
                !0 || function() {
                    var a = document.createElement("div").style;
                    return "transform" in a || "WebkitTransform" in a ||
                        "MozTransform" in a || "msTransform" in a ||
                        "MsTransform" in a || "OTransform" in a
                }(),
            transitions: window.Modernizr && Modernizr.csstransitions ===
                !0 || function() {
                    var a = document.createElement("div").style;
                    return "transition" in a || "WebkitTransition" in a ||
                        "MozTransition" in a || "msTransition" in a ||
                        "MsTransition" in a || "OTransition" in a
                }()
        },
        browser: {
            ie8: function() {
                var a = -1;
                if ("Microsoft Internet Explorer" == navigator.appName) {
                    var b = navigator.userAgent,
                        c = RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");
                    null != c.exec(b) && (a = parseFloat(RegExp.$1))
                }
                return -1 != a && 9 > a
            }(),
            ie10: window.navigator.msPointerEnabled
        }
    }, (window.jQuery || window.Zepto) && function(a) {
        a.fn.swiper = function(b) {
            var c = new i(a(this)[0], b);
            return a(this).data("swiper", c), c
        }
    }(window.jQuery || window.Zepto);
    var j = 0,
        k = 0,
        l = 0,
        m = 0,
        n = 0,
        o = 0,
        p = 0,
        q = 0,
        r = 0,
        s = new Array,
        u = void 0,
        v = !1;
    a(document).ready(function() {
        a("body").prepend('<div id="mpSmallbox"></div>')
    }), a(window).on("resize", function() {
        y(), x(), z(), B(), A(), D(), E(), F()
    }), a.mpSidePanel = function(b, c) {
        function j(c) {
            var d = a("#" + c);
            d.removeClass(b.animation).clearQueue(), d.animate({
                opacity: 0
            }, 200, function() {
                d.remove();
                var b = a(".mpSidePanel").length;
                0 == b && a("#mpBlackScreenSidePanel").animate({
                    opacity: 0
                }, 200, function() {
                    a(this).remove()
                })
            })
        }
        var d = "";
        var e = a("#mpSid" + r),
            i = "mpSid" + r;
        if (e.css({
            width: b.width
        }), void 0 != b.timeout && setTimeout(function() {
            j(i)
        }, b.timeout), e.find(".mpBannerbotMax").bind("click",
            function() {
                var b = a(window).width(),
                    d = a(window).height();
                e.css("z-index", "102"), e.animate({
                    top: "0px",
                    left: "0px",
                    width: b - 40 + "px",
                    height: d - 55 + "px"
                }, 300), "function" == typeof c && c && c(
                    "botMax")
            }), e.find(".mpBannerbotMin").bind("click", function() {
            var a = e.attr("Originalwidth"),
                b = e.attr("Originalheight");
            e.css("z-index", "101"), e.animate({
                height: b,
                width: a
            }, 300, function() {
                E()
            }), "function" == typeof c && c && c("botMin")
        }), e.find(".mpBannerbotClose").bind("click", function() {
            j(i), "function" == typeof c && c && c("botClose")
        }), 1 == b.notificationbar) {
            var k = new Date,
                l = "Just now at " + k.getHours() + ":" + k.getMinutes(),
                m = void 0;
            "function" == typeof c && (m = c), a.mpNotificationPanel({
                title: b.title,
                img: b.img,
                clearbutton: !0,
                items: [{
                    title: b.title,
                    date: l,
                    content: b.content,
                    callback: function() {
                        a.mpSidePanel({
                            html: b.html,
                            width: b.width,
                            position: b.position,
                            blackscreen: b.blackscreen,
                            title: b.title,
                            content: b.content,
                            img: b.img,
                            notificationbar:
                                !1,
                            closebuttons: b
                                .closebuttons,
                            iframe: b.iframe,
                            iframescrolling: b
                                .iframescrolling,
                            animation: b.animation,
                            timeout: b.timeout
                        }, m)
                    }
                }]
            })
        }
        F()
    }, a.mpInputBox = function(b, c) {
        function u(c) {
            var d = a("#" + c);
            d.removeClass(b.animation).clearQueue().animate({
                opacity: 0
            }, 200, function() {
                d.remove();
                var b = a("#mpMSGcontainer").find(
                    ".mpLoginBox").length;
                0 == b && a("#mpBlackScreen").animate({
                    opacity: 0
                }, 200, function() {
                    a(this).remove()
                })
            })
        }
        var d = "",
            e = 0;
        b = a.extend({
            type: "text",
            selectvalues: void 0,
            withheader: !0,
            headertext: "",
            width: "493px",
            title: void 0,
            content: "",
            img: void 0,
            draggable: !0,
            placeholder: "",
            buttons: "[Accept]",
            animation: "fadeIn"
        }, b), m += 1, 0 == a("#mpBlackScreen").length && (a("body")
            .prepend('<div id="mpBlackScreen"></div>'), a(
                "#mpBlackScreen").animate({
                opacity: 1
            }, 200));
        var f = 0;
        void 0 == b.title && void 0 == b.content && (f = 1);
        var g = a("#mpBlackScreen"),
            h = "mpLog" + m;
        switch (d += '<div class="mpLoginBox animated ' + b.animation +
            '" id="mpLog' + m + '" size="' + b.width +
            '" NoTitleNoContent="' + f + '">', 1 == b.withheader && (d +=
                '<div class="mpLoginHeader" align="center" style="width: ' +
                b.width + '">', d += b.headertext, d += "</div>"), d +=
            '<div class="mpLoginContainer" style="width: ' + b.width +
            '">', void 0 != b.img && (d +=
                '<div class="mpLoginImgBox">', d += '<img src="' + b.img +
                '" class="mlLoginImg">', d += "</div>"), d +=
            '<div class="mpLoginText">', void 0 != b.title && (d +=
                '<span class="mpLoginTitle">' + b.title + "</span>"), d +=
            b.content, d += "</div>", d +=
            '<div class="mpInputBoxContainer">', d +=
            '<div class="mpFieldInput">', b.type) {
            case "text":
                d +=
                    '<input class="mpInputcontrol" type="text" placeholder="' +
                    b.placeholder + '">';
                break;
            case "password":
                d +=
                    '<input class="mpInputcontrol" type="password" placeholder="' +
                    b.placeholder + '">';
                break;
            case "select":
                if (void 0 == b.selectvalues) return alert(
                    "selectvalues property is required, when you are trying to use a select type inputbox."
                ), 0;
                d += '<select class="mpInputcontrol">';
                for (var i = 0; i <= b.selectvalues.length - 1; i++) "[" ==
                    b.selectvalues[i] ? Name = "" : "]" == b.selectvalues[
                        i] ? (e += 1, Name = "<option value='" + Name +
                        "'> " + Name + "</option>", d += Name) : Name +=
                    b.selectvalues[i];
                d += "</select>"
        }
        d += "</div>", d += '<div class="mpInputFieldSpace">';
        for (var i = 0; i <= b.buttons.length - 1; i++) "[" == b.buttons[
            i] ? Name = "" : "]" == b.buttons[i] ? (e += 1, Name =
            "<button class='mpInputButtonToPresss' parentID='" + h +
            "' name='" + Name + "'> " + Name + "</button>", d +=
            Name) : Name += b.buttons[i];
        d += "</div>", d += "</div>", d += "</div>", d += "</div>", g.prepend(
            d);
        var j = a("#" + h);
        b.draggable === !0 ? j.draggable({
            start: function() {
                j.removeClass(b.animation).clearQueue().animate({
                    opacity: "0.50"
                })
            },
            stop: function() {
                j.clearQueue().animate({
                    opacity: "1"
                })
            }
        }) : j.find(".mpLoginHeader").css("cursor", "inherit");
        var k = j.height();
        p /= 2, k /= 2;
        var l = p - k,
            n = j.find(".mpLoginContainer").width();
        q /= 2, n /= 2;
        var o = q - n;
        j.css({
            position: "fixed",
            top: l + "px",
            left: o + "px"
        });
        var p = a(window).height(),
            q = a(window).width(),
            r = q,
            k = j.height(),
            k = j.height();
        p /= 2, k /= 2;
        var l = p - k,
            n = j.find(".mpLoginContainer").width(),
            f = j.attr("NoTitleNoContent");
        q /= 2, n /= 2;
        var o = q - n;
        j.css({
            position: "fixed",
            top: l + "px",
            left: o + "px"
        });
        var s = j.attr("size");
        OriginalWidth = s.replace("px", "").replace("%", ""), r >
            OriginalWidth ? (j.find(".mpLoginHeader").css("width", s),
                j.find(".mpLoginContainer").css("width", s)) : (j.find(
                ".mpLoginHeader").css("width", r - 10 + "px"), j.find(
                ".mpLoginContainer").css("width", r - 10 + "px"));
        var t = j.find(".mpLoginContainer").width();
        300 > t ? (j.find(".mpLoginForm").css("margin-left", "10px"), j
                .find(".mpFieldText").css("left", "90px"), j.find(
                    ".mpLoginText").css("font-size", "14px"), 0 == f ?
                j.find(".mlLoginImg").css({
                    height: "35px",
                    width: "35px"
                }) : j.find(".mlLoginImg").hide(), t -= 110) : (j.find(
                ".mlLoginImg").show(), j.find(".mpLoginForm").css(
                "margin-left", "100px"), j.find(".mpFieldText").css(
                "left", "180px"), j.find(".mpLoginText").css(
                "font-size", "16px"), j.find(".mlLoginImg").css({
                height: "80px",
                width: "80px"
            }), t -= 210), j.find(".mpFieldText").css("width", t + "px"),
            z(), j.find(".mpField1").focus(), j.find(
                ".mpInputButtonToPresss").bind("click", function() {
                var b = a(this).attr("name"),
                    d = j.find(".mpInputcontrol").val();
                "function" == typeof c && c && c(d, b), u(h)
            })
    }, a.mpModalPopUp = function(b, c) {
        function l(c) {
            var d = a("#" + c);
            d.removeClass(b.animation), d.addClass("fadeOut fast").animate({
                opacity: 0
            }, 100, function() {
                d.remove();
                var b = a(".mpModalPopUp").length;
                0 == b && a("#mpBlackScreenModal").animate({
                    opacity: 0
                }, 200, function() {
                    a(this).remove()
                })
            })
        }
        var d = "";
        b = a.extend({
            html: "Loading...",
            width: "300px",
            height: "300px",
            blackscreen: !0,
            title: "Popup",
            content: "Click here, to display the PopUp again.",
            img: void 0,
            notificationbar: !0,
            close: !0,
            iframe: void 0,
            iframescrolling: !1,
            draggable: !0,
            animation: "bounceInDown",
            timeout: void 0
        }, b), q += q + 1, 1 == b.blackscreen && 0 == a(
            "#mpBlackScreenModal").length && (a("body").prepend(
            '<div id="mpBlackScreenModal"></div>'), a(
            "#mpBlackScreenModal").animate({
            opacity: 1
        }, 200));
        var e = !1;
        if (void 0 != b.iframe && (e = !0), d +=
            '<div class="mpModalPopUp animated ' + b.animation +
            '" id="mpMod' + q + '" Originalwidth="' + b.width +
            '" Originalheight="' + b.height + '">', 1 == b.close && (d +=
                '<div class="mbBannerButtons mpBannerModalButtons">', d +=
                '<button class="mpBannerbotClose" title="' + h +
                '"></button>', d +=
                '<button class="mpBannerbotMin" title="' + f +
                '"></button>', d +=
                '<button class="mpBannerbotMax" title="' + g +
                '"></button>', d += "</div>"), d +=
            '<div class="mpModalPopUpContainer">', 1 == e) {
            var i = "no";
            1 == b.iframescrolling && (i = "yes"), d +=
                '<iframe width="100%" height="100%" frameborder="0" scrolling="' +
                i + '" marginheight="0" marginwidth="0" src="' + b.iframe +
                '"></iframe>'
        } else d += b.html;
        d += "</div>", d += "</div>", a("body").prepend(d);
        var j = a("#mpMod" + q),
            k = "mpMod" + q;
        if (j.css({
            width: b.width,
            height: b.height
        }), j.attr("OriginalheightPx", j.height() + 40), j.attr(
            "OriginalwidthPx", j.width()), E(1), j.clearQueue().animate({
            opacity: 1
        }, 300).css("opacity", "0"), 1 == b.draggable && (j.draggable({
            start: function() {
                a(".mpModalPopUp").css("z-index", "110")
                    .removeClass(b.animation).clearQueue(),
                    j.animate({
                        opacity: "0.50"
                    }), j.css("z-index", "111")
            },
            stop: function() {
                j.clearQueue().animate({
                    opacity: "1"
                })
            }
        }), j.css("cursor", "move")), j.find(".mpBannerbotMax").bind(
            "click", function() {
                var b = a(window).width(),
                    d = a(window).height();
                j.css("z-index", "102"), j.animate({
                    top: "10px",
                    left: "10px",
                    width: b - 40 + "px",
                    height: d - 55 + "px"
                }, 300), "function" == typeof c && c && c(
                    "botMax")
            }), j.find(".mpBannerbotMin").bind("click", function() {
            var a = j.attr("Originalwidth"),
                b = j.attr("Originalheight");
            j.css("z-index", "101"), j.animate({
                height: b,
                width: a
            }, 300, function() {
                E()
            }), "function" == typeof c && c && c("botMin")
        }), j.find(".mpBannerbotClose").bind("click", function() {
            l(k), "function" == typeof c && c && c("botClose")
        }), 1 == b.close && j.find(".mpModalPopClose").bind("click",
            function() {
                l(k)
            }), void 0 != b.timeout && setTimeout(function() {
            l(k)
        }, b.timeout), 1 == b.notificationbar) {
            var m = new Date,
                n = "Just now at " + m.getHours() + ":" + m.getMinutes(),
                o = void 0;
            "function" == typeof c && (o = c), a.mpNotificationPanel({
                title: b.title,
                img: b.img,
                clearbutton: !0,
                items: [{
                    title: b.title,
                    date: n,
                    content: b.content,
                    callback: function() {
                        a.mpModalPopUp({
                            html: b.html,
                            width: b.width,
                            height: b.height,
                            blackscreen: b.blackscreen,
                            title: b.title,
                            content: b.content,
                            img: b.img,
                            notificationbar:
                                !1,
                            close: b.close,
                            iframe: b.iframe,
                            iframescrolling: b
                                .iframescrolling,
                            draggable: b.draggable,
                            animation: b.animation,
                            timeout: b.timeout
                        }, o)
                    }
                }]
            })
        }
    }, a.mpMiniBox = function(b, c) {
        var d = "";
        b = a.extend({
                content: "Loading...",
                cssloading: !0,
                blackscreen: !0,
                img: void 0,
                blink: !0,
                clicktoclose: !1,
                closeonclick: !1,
                timeout: void 0
            }, b), 1 == b.blackscreen && 0 == a("#mpBlackScreenMini").length &&
            (a("body").prepend('<div id="mpBlackScreenMini"></div>'), a(
                "#mpBlackScreenMini").animate({
                opacity: 1
            }, 200)), p += 1;
        var e = "mpMiniBoxLabel",
            f = "";
        1 == b.closeonclick && (f = "mpMiniPointer"), d +=
            '<div class="mpMiniBox ' + f + '" id="mpMiniBox' + p + '">',
            d += '<div class="mpMiniBoxImgContainer" align="center">',
            1 == b.cssloading && (e = "mpMiniBoxLabelSpecial", d +=
                '<div class="mpSpecialLoading">', d +=
                '<div class="circle"></div>', d +=
                '<div class="circle1"></div>', d += "</div>"), 0 == b.cssloading &&
            void 0 != b.img && (d +=
                '<img src="static/img/Leopard/Quartz Composer.png">'),
            d += '<div class="mpLoadingText ' + e + '" status="show">',
            d += b.content, d += "</div>", d += "</div>", d += "</div>",
            a(".mpMiniBox").each(function() {
                a(this).remove()
            }), a("body").prepend(d);
        var g = "mpMiniBox" + p,
            h = a("#" + g);
        h.animate({
            opacity: 1
        }), D();
        var i = "";
        1 == b.blink && (i = setInterval(function() {
            var b = a(".mpLoadingText"),
                c = b.attr("status");
            "show" == c ? b.animate({
                opacity: 0
            }, 500, function() {
                b.attr("status", "hide")
            }) : b.animate({
                opacity: 1
            }, 500, function() {
                b.attr("status", "show")
            })
        }, 1e3)), void 0 != b.timeout && setTimeout(function() {
            clearInterval(i), h.animate({
                opacity: 0
            }, 300, function() {
                h.remove();
                var b = a(".mpMiniBox").length;
                0 == b && a("#mpBlackScreenMini").animate({
                    opacity: 0
                }, 200, function() {
                    a(this).remove()
                })
            })
        }, b.timeout), h.bind("click", function() {
            1 == b.closeonclick && (clearInterval(i),
                "function" == typeof c && (c && c(), h.removeClass(
                    b.animation).clearQueue().animate({
                    opacity: 0
                }, 300, function() {
                    h.remove();
                    var b = a(".mpMiniBox").length;
                    0 == b && a(
                        "#mpBlackScreenMini").animate({
                        opacity: 0
                    }, 200, function() {
                        a(this).remove()
                    })
                })))
        })
    }, a.mpNotificationPanel = function(b) {
        0 == o && u.removeAllSlides(), u.swipeTo(0), u.reInit();
        var d = "";
        b = a.extend({
                title: "",
                img: void 0,
                clearbutton: !0
            }, b), n += 1, o += 1, d +=
            '<div class="mpNotititle" id="mpNot' + n + '">', void 0 !=
            b.img && (d += '<div class="mpTitleimgbox">', d +=
                '<img class="mpNotiImg" src="' + b.img + '">', d +=
                "</div>"), d += '<div class="mpNotiTitlebox">', d += b.title,
            d += "</div>", 1 == b.clearbutton && (d +=
                '<div class="mpCloseNotiContainer">', d +=
                '<button class="mpCloseNotiGroup" close="mpNot' + n +
                '">X</button>', d += "</div>"), d += "</div>";
        var f = u.createSlide(d);
        u.prependSlide(f), u.reInit(), C(), 1 == b.clearbutton && a(
            "#mpNotificationPanel").on("click", ".mpCloseNotiGroup",
            function() {
                var b = a(this).html();
                if ("clear" == b)
                    for (var c = a(this).attr("close"), d = u.slides
                        .length - 1; d >= 0; d--) {
                        var e = u.slides[d],
                            f = e.html().indexOf('close="' + c);
                        f > 0 && (o -= 1, u.removeSlide(d), u.reInit(),
                            C(), u.swipePrev())
                    } else a(this).clearQueue().animate({
                        width: "45px"
                    }, 100, function() {
                        a(this).html("clear")
                    })
            });
        var h = "mpNot" + n,
            i = a("#" + h);
        if (i.slideDown(150), void 0 == b.items) return 0;
        for (var j = 0; j <= b.items.length - 1; j++) {
            d = "";
            var k = "",
                l = "",
                m = "";
            k = void 0 == b.items[j].title ? "&nbsp" : b.items[j].title,
                l = void 0 == b.items[j].date ? "&nbsp" : b.items[j].date,
                m = void 0 == b.items[j].content ? "&nbsp" : b.items[j]
                .content, n += 1, o += 1, d += '<div id="mpItem' + n +
                '" index="' + n + '" class="mpNotiSubContent" close="' +
                h + '">', d += '<div class="mpNotiSubTitle">', d +=
                '<div class="left">' + k + "</div>", d +=
                '<div class="right">' + l + "</div>", d += "<br>", d +=
                "</div>", d += '<div class="mpNotiContent">', d += m, d +=
                "</div>", j > 0 && (d +=
                    '<div class="mpSpacerContainer" align="center" close="mpNot' +
                    n + '"><div class="mpSpacer"></div></div>'), d +=
                "</div>";
            var f = u.createSlide(d);
            u.insertSlideAfter(0, f), u.reInit(), "function" == typeof b
                .items[j].callback && (s[n] = b.items[j].callback, a(
                    "#mpItem" + n).bind("click", function() {
                    var b = a(this).attr("index");
                    s[b].call()
                }))
        }
        C(), u.reInit()
    }, a.mpLogin = function(b, c) {
        function t(c) {
            var d = a("#" + c);
            d.removeClass(b.animation).clearQueue().animate({
                opacity: 0
            }, 200, function() {
                d.remove();
                var c = a("#mpMSGcontainer").find(
                    ".mpLoginBox").length;
                0 == c && a("#mpBlackScreen").removeClass(b
                    .animation).clearQueue().animate({
                    opacity: 0
                }, 200, function() {
                    a(this).remove()
                })
            })
        }
        var d = "";
        b = a.extend({
            withheader: !0,
            headertext: "",
            width: "493px",
            title: void 0,
            content: "",
            img: void 0,
            draggable: !0,
            Label1: "Name",
            Label2: "Password",
            buttoncancel: "Cancel",
            buttonunlock: "Unlock",
            animation: ""
        }, b), m += 1, 0 == a("#mpBlackScreen").length && (a("body")
            .prepend('<div id="mpBlackScreen"></div>'), a(
                "#mpBlackScreen").animate({
                opacity: 1
            }, 200));
        var f = 0;
        void 0 == b.title && void 0 == b.content && (f = 1);
        var g = a("#mpBlackScreen"),
            h = "mpLog" + m;
        d += '<div class="mpLoginBox animated ' + b.animation +
            '" id="mpLog' + m + '" size="' + b.width +
            '" NoTitleNoContent="' + f + '">', 1 == b.withheader && (d +=
                '<div class="mpLoginHeader" align="center" style="width: ' +
                b.width + '">', d += b.headertext, d += "</div>"), d +=
            '<div class="mpLoginContainer" style="width: ' + b.width +
            '">', void 0 != b.img && (d +=
                '<div class="mpLoginImgBox">', d += '<img src="' + b.img +
                '" class="mlLoginImg">', d += "</div>"), d +=
            '<div class="mpLoginText">', void 0 != b.title && (d +=
                '<span class="mpLoginTitle">' + b.title + "</span>"), d +=
            b.content, d += "</div>", d += '<div class="mpLoginForm">',
            d += '<div class="mpField">', d += "<label>" + b.Label1 +
            "</label>", d +=
            '<input class="mpField1 mpFieldText" type="text" placeholder="' +
            b.Label1 + '">', d += "</div>", d +=
            '<div class="mpField">', d += "<label>" + b.Label2 +
            "</label>", d +=
            '<input class="mpField2 mpFieldText" type="password" placeholder="' +
            b.Label2 + '">', d += "</div>", d +=
            '<div class="mbLoginButtonBox">', d +=
            '<button class="mpLoginbotCancel">' + b.buttoncancel +
            "</button>", d += '<button class="mpLoginbotUnlock">' + b.buttonunlock +
            "</button>", d += "</div>", d += "</div>", d += "</div>", d +=
            "</div>", g.prepend(d);
        var i = a("#" + h);
        b.draggable === !0 ? i.draggable({
            start: function() {
                a(".mpLoginBox").css("z-index", "110").removeClass(
                    b.animation).clearQueue(), i.animate({
                    opacity: "0.50"
                }), i.css("z-index", "111")
            },
            stop: function() {
                i.clearQueue().animate({
                    opacity: "1"
                })
            }
        }) : i.find(".mpLoginHeader").css("cursor", "inherit");
        var j = i.height();
        o /= 2, j /= 2;
        var k = o - j,
            l = i.find(".mpLoginContainer").width();
        p /= 2, l /= 2;
        var n = p - l;
        i.css({
            position: "fixed",
            top: k + "px",
            left: n + "px"
        });
        var o = a(window).height(),
            p = a(window).width(),
            q = p,
            j = i.height(),
            j = i.height();
        o /= 2, j /= 2;
        var k = o - j,
            l = i.find(".mpLoginContainer").width(),
            f = i.attr("NoTitleNoContent");
        p /= 2, l /= 2;
        var n = p - l;
        i.css({
            position: "fixed",
            top: k + "px",
            left: n + "px"
        });
        var r = i.attr("size");
        OriginalWidth = r.replace("px", "").replace("%", ""), q >
            OriginalWidth ? (i.find(".mpLoginHeader").css("width", r),
                i.find(".mpLoginContainer").css("width", r)) : (i.find(
                ".mpLoginHeader").css("width", q - 10 + "px"), i.find(
                ".mpLoginContainer").css("width", q - 10 + "px"));
        var s = i.find(".mpLoginContainer").width();
        300 > s ? (i.find(".mpLoginForm").css("margin-left", "10px"), i
                .find(".mpFieldText").css("left", "90px"), i.find(
                    ".mpLoginText").css("font-size", "14px"), 0 == f ?
                i.find(".mlLoginImg").css({
                    height: "35px",
                    width: "35px"
                }) : i.find(".mlLoginImg").hide(), s -= 110) : (i.find(
                ".mlLoginImg").show(), i.find(".mpLoginForm").css(
                "margin-left", "100px"), i.find(".mpFieldText").css(
                "left", "180px"), i.find(".mpLoginText").css(
                "font-size", "16px"), i.find(".mlLoginImg").css({
                height: "80px",
                width: "80px"
            }), s -= 210), i.find(".mpFieldText").css("width", s + "px"),
            z(), i.find(".mpField1").focus(), i.find(
                ".mpLoginbotCancel").bind("click", function() {
                "function" == typeof c && c && c("botClose", "none",
                    "none"), t(h)
            }), i.find(".mpLoginbotUnlock").bind("click", function() {
                var a = i.find(".mpField1").val(),
                    b = i.find(".mpField2").val();
                return 0 == a.length ? (i.find(".mpField1").focus(),
                    0) : 0 == b.length ? (i.find(".mpField2").focus(),
                    0) : ("function" == typeof c && c && c(
                    "botUnlock", a, b), t(h), void 0)
            })
    }, a.mpBanner = function(b, c) {
        function k(c) {
            var d = a("#" + c),
                e = d.hasClass("mpBannerTop");
            1 == e ? d.removeClass(b.animation).clearQueue().animate({
                opacity: 0,
                top: "-" + d.height() + "px"
            }, 300, function() {
                a(this).remove()
            }) : d.removeClass(b.animation).clearQueue().animate({
                opacity: 0,
                bottom: "-" + d.height() + "px"
            }, 300, function() {
                a(this).remove()
            })
        }
        var d = "";
        b = a.extend({
                position: "top",
                title: void 0,
                content: "",
                img: void 0,
                timeout: void 0,
                animation: "",
                notificationbar: !1,
                withbuttons: !0
            }, b), l += 1, d += "top" == b.position ?
            '<div class="mpBanner mpBannerTop animated ' + b.animation +
            '" id="mpBan' + l + '">' :
            '<div class="mpBanner mpBannerBottom animated ' + b.animation +
            '" id="mpBan' + l + '">', 1 == b.withbuttons && (d +=
                '<div class="mbBannerButtons">', d +=
                '<button class="mpBannerbotClose" title="' + h +
                '"></button>', d +=
                '<button class="mpBannerbotMin" title="' + f +
                '"></button>', d +=
                '<button class="mpBannerbotMax" title="' + g +
                '"></button>', d += "</div>"), d +=
            '<div align="center">', d +=
            '<div class="mpBannerContainer">', void 0 != b.title && (d +=
                '<div class="mpBannerTitle">' + b.title + "</div>"), d +=
            '<div class="mpBannerTextbox" align="center">', d += b.content,
            d += "</div>", void 0 != b.img && (d +=
                '<div class="mpBannerImgbox">', d += '<img src="' + b.img +
                '" class="mpBannerImgboxImg">', d += "</div>"), d +=
            "</div>", d += "</div>", d += "</div>", a("body").prepend(d);
        var i = "mpBan" + l,
            j = a("#" + i);
        if (j.animate({
            opacity: 1
        }, 300), x(), void 0 != b.timeout && setTimeout(function() {
            k(i)
        }, b.timeout), j.find(".mpBannerbotClose").bind("click",
            function() {
                "function" == typeof c && c && c("botClose"), k(i)
            }), j.find(".mpBannerbotMax").bind("click", function() {
            k(i), "function" == typeof c && c && c("botMax"), a(
                "body").delay(300).clearQueue().queue(
                function() {
                    a.mpMessageBox({
                        withheader: !1,
                        headertext: "",
                        title: b.title,
                        content: b.content,
                        img: b.img,
                        timeout: void 0,
                        draggable: !1,
                        buttons: "[close]",
                        animation: ""
                    })
                })
        }), j.find(".mpBannerbotMin").bind("click", function() {
            k(i);
            var d = void 0;
            "function" == typeof c && (c && c("botMin"), d = c),
                a.mpNotificationPanel({
                    title: b.title,
                    img: b.img,
                    clearbutton: !0,
                    items: [{
                        title: b.title,
                        date: "Just now",
                        content: b.content,
                        callback: function() {
                            a.mpBanner({
                                position: b
                                    .position,
                                title: b
                                    .title,
                                content: b
                                    .content,
                                img: b.img,
                                animation: b
                                    .animation,
                                notificationbar: b
                                    .notificationbar,
                                withbuttons: b
                                    .withbuttons
                            }, d)
                        }
                    }]
                })
        }), j.bind("mouseover", function() {
            v = !0
        }), j.bind("mouseleave", function() {
            v = !1
        }), 1 == b.notificationbar) {
            var m = void 0;
            "function" == typeof c && (m = c), a.mpNotificationPanel({
                title: b.title,
                img: b.img,
                clearbutton: !0,
                items: [{
                    title: b.title,
                    date: "Just now",
                    content: b.content,
                    callback: function() {
                        a.mpBanner({
                            position: b.position,
                            title: b.title,
                            content: b.content,
                            img: b.img,
                            animation: b.animation,
                            notificationbar:
                                !1,
                            withbuttons: b.withbuttons
                        }, m)
                    }
                }]
            })
        }
    }, a.mpMessageBox = function(b, c) {
        function q(b) {
            var c = a("#" + b);
            c.fadeOut(150, function() {
                a(this).remove();
                var b = a("#mpMSGcontainer").find(
                    ".mpMsgbox").length;
                0 == b && a("#mpBlackScreen").animate({
                    opacity: 0
                }, 300, function() {
                    a(this).remove()
                })
            })
        }
        var d = "",
            e = 0;
        b = a.extend({
            withheader: !0,
            headertext: "",
            width: "460px",
            title: void 0,
            content: "",
            img: void 0,
            timeout: void 0,
            draggable: !0,
            buttons: void 0,
            animation: ""
        }, b), k += 1, 0 == a("#mpBlackScreen").length && (a("body")
            .prepend('<div id="mpBlackScreen"></div>'), a(
                "#mpBlackScreen").animate({
                opacity: 1
            }, 200));
        var f = a("#mpBlackScreen");
        0 == a("#mpMSGcontainer").length && f.append(
            '<div id="mpMSGcontainer" align="center"></div>');
        var g = a("#mpMSGcontainer"),
            h = "mpMsg" + k;
        if (d += '<div class="mpMsgbox animated ' + b.animation +
            '" id="mpMsg' + k + '" size="' + b.width + '">', 1 == b.withheader &&
            (d += '<div class="mpMsgHeader">', d += b.headertext, d +=
                "</div>"), d += '<div class="mpMsgContainer">', d +=
            "<br>", void 0 != b.img && (d += '<div class="mpMsgImg">',
                d += '<img src="' + b.img + '">', d += "</div>"), d +=
            '<div class="mpMsgContent" align="left">', void 0 != b.title &&
            (d += '<span class="mpMsgTitle">' + b.title +
                "</span><br/>"), d += '<span class="mpMsgText">' + b.content +
            "</span>", d += "</div>", d += "", void 0 != b.buttons) {
            d += '<div class="mpMsgButtons" align="right">';
            for (var i = 0; i <= b.buttons.length - 1; i++) "[" == b.buttons[
                i] ? Name = "" : "]" == b.buttons[i] ? (e += 1,
                Name = "<button parentID='" + h + "' name='" + Name +
                "'> " + Name + "</button>", d += Name) : Name += b.buttons[
                i];
            d += "</div>"
        }
        d += "</div>", d += "</div>", g.append(d);
        var j = a("#" + h);
        b.draggable === !0 ? j.draggable({
            start: function() {
                j.css("z-index", "110").removeClass().addClass(
                    "mpMsgbox").clearQueue(), j.animate({
                    opacity: "0.50"
                }), j.css("z-index", "111")
            },
            stop: function() {
                j.clearQueue().animate({
                    opacity: "1"
                })
            }
        }) : j.find(".mpMsgHeader").css("cursor", "inherit");
        var l = a(window).width(),
            m = j.find(".mpMsgContainer").width();
        l > m ? (j.find(".mpMsgHeader").css("width", b.width), j.find(
            ".mpMsgContainer").css("width", b.width)) : (j.find(
            ".mpMsgHeader").css("width", "98%"), j.find(
            ".mpMsgContainer").css("width", "98%"));
        var n = 0,
            o = 0;
        j.find(".mpMsgImg").length > 0 && (j.find(".mpMsgImg").removeAttr(
                "style"), n = j.find(".mpMsgImg").height()), j.find(
                ".mpMsgContent").removeAttr("style"), o = j.find(
                ".mpMsgContent").height(), o > n && j.find(".mpMsgImg")
            .css("height", o + "px"), j.find(".mpMsgContent").css(
                "margin-bottom", "15px"), void 0 != b.timeout &&
            setTimeout(function() {
                q(h)
            }, b.timeout), a("#" + h + " button").bind("click",
                function() {
                    var b = a(this),
                        d = b.attr("name"),
                        e = b.attr("parentID");
                    "function" == typeof c && c && c(d), q(e)
                });
        var r = a(window).height(),
            s = j.height();
        r /= 2, s /= 2;
        var t = r - s,
            l = a(window).width(),
            m = j.find(".mpMsgContainer").width();
        l /= 2, m /= 2;
        var u = l - m;
        j.css({
            position: "fixed",
            top: t + "px",
            left: u + "px"
        }), y()
    }, a.mpSmallBox = function(b, c) {
        function o(b) {
            var c = a("#mpSmallbox").children(),
                d = a("#" + b),
                e = c.attr("id"),
                f = d.attr("id");
            d.find(".mpSNButtons").length, d.slideUp(450, function() {
                a(this).remove()
            }).addClass("fadeOutRight fast"), e == f && a(
                ".mpSmallNotification").animate({
                top: "0px"
            })
        }
        var d = "",
            e = "",
            f = 0;
        if (b = a.extend({
                title: void 0,
                content: "",
                img: void 0,
                buttons: void 0,
                closeonclick: !1,
                timeout: void 0,
                notificationbar: !0,
                animation: "fadeInDown fast"
            }, b), j += 1, e = void 0 != b.img ? void 0 == b.buttons ?
            "withButtonsNoIMG" : "withButtons" : void 0 == b.buttons ?
            "withNoButtons" : "withButtonsNoIMG", d += '<div id="mpSB' +
            j + '" class="mpSmallNotification animated ' + b.animation +
            '">', void 0 != b.img && (d +=
                '<div class="mpSNimgContainer">', d +=
                '<img class="mpSNimg" src="' + b.img + '">', d +=
                "</div>"), d += '<div class="mpSNtextContainer ' + e +
            '" >', void 0 != b.title && (d +=
                '<span class="mpSNtitle">' + b.title + "</span>", d +=
                "<br>"), d += '<span class="mpSNcontent">' + b.content +
            "</span>", d += "</div>", void 0 != b.buttons) {
            var g = "";
            d += '<div class="mpSNButtons">';
            for (var h = 0; h <= b.buttons.length - 1; h++) "[" == b.buttons[
                h] ? g = "" : "]" == b.buttons[h] ? (f += 1, g =
                "<button parentID='mpSB" + j + "' name='" + g +
                "'> " + g + "</button>", d += g) : g += b.buttons[h];
            d += "</div>"
        }
        d += "</div>", a(".mpSmallNotification").animate({
            top: "50px"
        }, 300), a("#mpSmallbox").prepend(d);
        var i = a("#mpSB" + j),
            k = i.attr("id"),
            l = i.find(".mpSNtextContainer").height(),
            m = 34 * f,
            n = 0;
        if (l > m ? n = l : (n = m, i.find(".mpSNtextContainer").css(
            "height", n + 20 + "px")), i.css("height", n + 20 + "px"), i.bind(
            "click", function() {
                var d = a(this).attr("id"),
                    e = i.find(".mpSNButtons").length;
                void 0 == b.buttons && 1 == b.closeonclick && o(d),
                    0 == e && "function" == typeof c && c && c(
                        "@closed")
            }), a("#" + k + " button").bind("click", function() {
            var b = a(this),
                d = b.attr("name"),
                e = b.attr("parentID");
            "function" == typeof c && c && c(d), o(e)
        }), void 0 != b.timeout && setTimeout(function() {
            o(k)
        }, b.timeout), i.bind("mouseover", function() {
            v = !0
        }), i.bind("mouseleave", function() {
            v = !1
        }), 1 == b.notificationbar) {
            var p = void 0;
            "function" == typeof c && (p = c);
            var q = new Date,
                r = "Just now at " + q.getHours() + ":" + q.getMinutes();
            a.mpNotificationPanel({
                title: b.title,
                img: b.img,
                clearbutton: !0,
                items: [{
                    title: b.title,
                    date: r,
                    content: b.content,
                    callback: function() {
                        a.mpSmallBox({
                            title: b.title,
                            content: b.content,
                            img: b.img,
                            buttons: b.buttons,
                            closeonclick: b
                                .closeonclick,
                            timeout: b.timeout,
                            notificationbar:
                                !1,
                            animation: b.animation
                        }, p)
                    }
                }]
            })
        }
    }
}(jQuery);