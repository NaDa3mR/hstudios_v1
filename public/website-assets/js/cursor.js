class Cursor {
    constructor(options) {
        this.options = jQuery.extend(true, {
            container: "body",
            speed: 0.7,
            ease: "expo.out",
            visibleTimeout: 300
        }, options);
        this.body = jQuery(this.options.container);
        this.el = jQuery('<div class="pbmit-cursor"></div>');
        this.text = jQuery('<div class="pbmit-cursor-text"></div>');
        this.init();
    }
    init() {
        this.datatag();
        this.el.append(this.text);
        this.body.append(this.el);
        this.bind();
        this.move(-window.innerWidth, -window.innerHeight, 0);
        dragcursor();
    }
    datatag() {
        jQuery('.elementor-section').each(function(i, e) {
            jQuery(e).attr('data-cursor', '');
            if (jQuery(e).hasClass('pbmit-cursor-color-light-color')) {
                jQuery(e).attr('data-cursor', 'light-color');
            } else if (jQuery(e).hasClass('pbmit-cursor-color-white-color')) {
                jQuery(e).attr('data-cursor', 'white-color');
            } else if (jQuery(e).hasClass('pbmit-cursor-color-global-color')) {
                jQuery(e).attr('data-cursor', 'global-color');
            } else if (jQuery(e).hasClass('pbmit-cursor-color-secondary-color')) {
                jQuery(e).attr('data-cursor', 'secondary-color');
            } else if (jQuery(e).hasClass('pbmit-cursor-color-transparent-color')) {
                jQuery(e).attr('data-cursor', 'transparent-color');
            } else {
                jQuery(e).attr('data-cursor', 'blackish-color');
            }
        });
    }
    bind() {
        const self = this;
        this.body.on('mouseleave', () => {
            self.hide();
        }).on('mouseenter', () => {
            self.show();
        }).on('mousemove', (e) => {
            this.pos = {
                x: this.stick ? this.stick.x - ((this.stick.x - e.clientX) * 0.15) : e.clientX,
                y: this.stick ? this.stick.y - ((this.stick.y - e.clientY) * 0.15) : e.clientY
            };
            this.update();

        }).on('mousedown', () => {
            self.setState('-active');
        }).on('mouseup', () => {
            self.removeState('-active');
        }).on('mouseenter', 'a,input,textarea,button', () => {
            self.setState('-pointer');
        }).on('mouseleave', 'a,input,textarea,button', () => {
            self.removeState('-pointer');
        }).on('mouseenter', 'iframe', () => {
            self.hide();
        }).on('mouseleave', 'iframe', () => {
            self.show();
        }).on('mouseenter', '[data-cursor]', function() {
            self.setState(this.dataset.cursor);
        }).on('mouseleave', '[data-cursor]', function() {
            self.removeState(this.dataset.cursor);
        }).on('mouseenter', '[data-cursor-text]', function() {
            self.setText(this.dataset.cursorText);
        }).on('mouseleave', '[data-cursor-text]', function() {
            self.removeText();
        }).on('mouseenter', '[data-cursor-stick]', function() {
            self.setStick(this.dataset.cursorStick);
        }).on('mouseleave', '[data-cursor-stick]', function() {
            self.removeStick();
        }).on('mouseenter', '[data-cursor-tooltip]', function() {
            self.setTootip(this.dataset.cursorTooltip);
        }).on('mouseleave', '[data-cursor-tooltip]', function() {
            self.removeTooltip();
        });
    }
    setState(state) {
        this.el.addClass(state);
    }
    removeState(state) {
        this.el.removeClass(state);
    }
    toggleState(state) {
        this.el.toggleClass(state);
    }
    setText(text) {
        this.text.html(text);
        this.el.addClass('-text');
    }
    removeText() {
        this.el.removeClass('-text');
    }
    setTootip(text) {
        this.text.html(text);
        this.el.addClass('-tooltip');
    }
    removeTooltip() {
        this.text.html('');
        this.el.removeClass('-tooltip');
    }
    setStick(el) {
        const target = jQuery(el);
        const bound = target.get(0).getBoundingClientRect();
        this.stick = {
            y: bound.top + (target.height() / 2),
            x: bound.left + (target.width() / 2)
        };
        this.move(this.stick.x, this.stick.y, 5);
    }
    removeStick() {
        this.stick = false;
    }
    update() {
        this.move();
        this.show();
    }
    move(x, y, duration) {
        gsap.to(this.el, {
            x: x || this.pos.x,
            y: y || this.pos.y,
            force3D: true,
            overwrite: true,
            ease: this.options.ease,
            duration: this.visible ? (duration || this.options.speed) : 0
        });
    }
    show() {
        if (this.visible) return;
        clearInterval(this.visibleInt);
        this.el.addClass('-visible');
        this.visibleInt = setTimeout(() => this.visible = true);
    }
    hide() {
        clearInterval(this.visibleInt);
        this.el.removeClass('-visible');
        this.visibleInt = setTimeout(() => this.visible = false, this.options.visibleTimeout);
    }

}

function dragcursor() {
    let cursor2 = document.querySelector(".pbmit-cursor");
    document.addEventListener("pointermove", moveCursor);

    function moveCursor(e) {
        gsap.to(cursor2, {
            duration: .5,
            x: e.clientX,
            y: e.clientY,
            autoAlpha: 1,
            ease: "ease-in-out",
        });
    }
}