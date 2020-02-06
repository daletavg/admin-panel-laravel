<div class="modal fade modal-consult" id="consultModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <img src="{{asset('img/cross-modal-close.svg')}}" alt="">
                </button>
            </div>
            <div class="modal-body d-flex flex-column align-items-center">
                <p class="modal-consult__title mb-10">Бесплатная консультация</p>
                <p class="modal-consult__text mb-25">Оставьте свои контакты, опишите тему вопроса и наш менеджер
                    проконсультирует вас в ближайшее время</p>
                <form action="{{route('mail.send')}}" class="modal-consult__form ajax-form">
                    <input type="hidden" name="stock" class="hidden-input not-required_input">
                    <input type="text" name="name" class="modal-consult__input mb-35 not-required_input" placeholder="Имя">
                    <input type="tel" name="phone" class="modal-consult__input mb-35 required_input masked_input" placeholder="Номер телефона*">
                    <input type="text" name="message" class="modal-consult__input mb-35 not-required_input" placeholder="Опишите вопрос">
                    <button type="submit" class="modal-consult__btn preloader_btn"><div class="preloader_btn-box"></div><span>Отправить заявку</span></button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade modal-consult" id="thankModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column align-items-center">
                <p class="modal-consult__title mb-10">Спасибо, заявка принята!</p>
                <p class="modal-consult__text mb-25">Наш менеджер свяжется с вами для дальнейшей консультации по
                    интересующему вас вопросу в ближайшее время. Благодарим за доверие!</p>
            </div>
        </div>
    </div>
</div>


<div
    class="modal fade"
    id="phoneModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="phoneModalTitle"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-centered align-items-end"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-content-box">
                <div
                    class="modal-header border-bottom d-flex justify-content-center align-items-center p-3"
                >
                    <p class="phone-mobile-title text-center mb-0">
                        Выберите номер</p>
                </div>
                <div class="modal-body p-0 border-top text-center">
                    <a
                        href="tel:8 (965) 763 07 05"
                        class="p-3 d-flex phones-box__item flex-row align-items-center justify-content-center"
                    >

                        <span class="phone">{{$firstPhone}}</span>
                    </a>
                </div>
                <div class="modal-body p-0 border-top text-center">
                    <a
                        href="tel:8 (965) 763 07 05"
                        class="p-3 d-flex phones-box__item flex-row align-items-center justify-content-center"
                    >
                        <span class="phone">{{$secondPhone}}</span>
                    </a>
                </div>
            </div>
            <div class="modal-footer">
            <span class="mx-auto" data-dismiss="modal">
                Отмена
            </span>
            </div>
        </div>
    </div>
</div>
