<div
    class="modal fade"
    id="phoneModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="feedBackModalCenter"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered maxWth730" role="document">
        <div class="modal-content">
            <div class="modal-body position-relative text-center">

                <h5 class="feedBack-modal-title ">
                    Чтоб получить консультацию
                </h5>
                <p class="modal-text">
                    Оставьте свои контактные данные
                </p>
                <p class="modal-text modal-text-decor">
                    Наш специалист свяжется с Вами
                </p>
                <form action="{{route('mail.send')}}" class="feedBack-modal-form">
                    <input
                        class="feedBack-modal-input"
                        placeholder="Имя"
                        name="name"
                        required="true"
                        type="text"
                        autocomplete="off"
                    />
                    <input
                        class="feedBack-modal-input"
                        placeholder="Телефон"
                        name="phone"
                        required="true"
                        type="text"
                        autocomplete="off"
                    />
                    <input
                        class="feedBack-modal-input"
                        placeholder="E-mail"
                        name="e-mail"
                        required="true"
                        type="email"
                        autocomplete="off"
                    />
                    <button
                        type="submit"
                        class="btn-custom mx-auto"
                       
                    >
                        Отправить заявку
                    </button>
                </form>
                <button
                    type="button"
                    class="close custom-cross"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="modal-sm-desc">Спасибо за доверие! Введенные данные не подлежат распрастранению, и будут использованы только для обработки Вашей заявки.</p>
            </div>
        </div>
    </div>
</div>
<!-- 
   data-dismiss="modal"
                        aria-label="Close"
 -->
<!-- success modal -->
<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Спасибо за заявку</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Наши специалисты свяжутся с Вами в ближайшее время
      </div>
    </div>
  </div>
</div>
<!-- callModal -->

<div
  class="modal fade"
  id="callModal"
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
          class="modal-header d-flex justify-content-center align-items-center p-3"
        >
          <p class="phone-mobile-title text-center mb-0">
            Наши номера для связи
          </p>
        </div>
          @foreach ($phones as $phone)

        <div class="modal-body border-bottom text-center">
          <a
            href=""
            class="phones-box__item flex-row align-items-center justify-content-center"
          >
            <span class="phone">{{$phone}}</span>
          </a>
        </div>
          @endforeach
      </div>
      <div class="modal-footer">
        <span class="mx-auto" data-dismiss="modal">
          Отмена
        </span>
      </div>
    </div>
  </div>
</div>
