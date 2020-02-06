<section class="consult-section" data-aos="">
    <div class="consult-section__back" data-src-image="{{$formImage??''}}"></div>
    <div class="wrapper {{$formClass??''}}">
        <div class="consult-section__container">
            <p class="consult-section__title mb-lg-15">Бесплатная консультация</p>
            <p class="consult-section__description mb-40 mb-lg-15">Для современного мира семантический разбор внешних противодействий является</p>
            <form action="{{route('mail.send')}}" class="consult-section__form  ajax-form">
                <input type="hidden" name="stock" class="hidden-input not-required_input">
                <input type="text" name="name" class="consult-section__input mb-35 not-required_input" placeholder="Имя">
                <input type="tel" name="phone" class="consult-section__input mb-35 required_input masked_input" placeholder="Номер телефона*">
                <input type="text" name="message" class="consult-section__input mb-35 not-required_input" placeholder="Опишите вопрос">
                <button type="submit" class="consult-section__btn orange-btn preloader_btn"><div class="preloader_btn-box"></div><span>Отправить заявку</span></button>
            </form>
        </div>
    </div>
</section>
