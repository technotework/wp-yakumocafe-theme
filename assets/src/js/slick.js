
import $ from "jquery";
import "slick-carousel";

/**
 * ready
 */
$(window).on("load", () => {
    init();
});

/**
 * 初期化
 */
function init() {
    //スライドのセットアップ
    setupSlide();
}

/**
 * スライドの設定処理
 */
function setupSlide() {
    const groups = [
        "#js-content-monthly"
    ];

    const prev = `
    <div class="p-content-monthly__back">
    </div>
    `;

    const next = `
    <div class="p-content-monthly__next">
    </div>
    `;

    for (let i = 0; i < groups.length; i++) {
        let $target = $(groups[i]);
        $target.slick({
            prevArrow: prev,
            nextArrow: next
        });
    }
}
