<main id="partners-page">
    <section class="become_section">
        <div class="wrapper">
            <p
                class="become_section__title mb-20 mb-25"
                class="about_section__text"
                data-aos="fade-up"
                data-aos-once="true"
                data-aos-delay="50"
                data-aos-duration="1000"
            >
                {{getTranslate('posters.partners')}}
            </p>
            <div class="row">
                <div
                    class="col-12 px-0 px-lg-3 mb-50 mb-lg-0 col-lg-5"
                    class="about_section__text"
                    data-aos="fade-up"
                    data-aos-once="true"
                    data-aos-delay="150"
                    data-aos-duration="1000"
                >
                    <img
                        src="{{asset('img/public/partners-image.jpg')}}"
                        alt=""
                        class="become_section__img"
                    />
                </div>
                <div
                    class="col-12 col-lg-6 offset-lg-1 d-lg-flex flex-column justify-content-center"
                    class="about_section__text"
                    data-aos="fade-up"
                    data-aos-once="true"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                >
                    <p class="become_section__subtitle mb-20">
                        Как стать нашим партнером
                    </p>
                    <p class="become_section__text">
                        ARTPOINT - международное агентство, успешно развивающееся в сфере
                        концертной деятельности уже более 10 лет. Диапазон наших проектов
                        разнообразен: от классического и модерн балета, танго до современных
                        шоу-программ. <br />
                        <br />
                        Мы сотрудничаем с лучшими концертными и театральными площадками
                        Украины и ближнего зарубежья.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="advantages_section">
        <div class="wrapper">
            <p
                class="become_section__title mb-30"
                class="about_section__text"
                data-aos="fade-up"
                data-aos-once="true"
                data-aos-delay="50"
                data-aos-duration="1000"
            >
                {{getTranslate('advantages.partners')}}
            </p>
            <div class="row">
                <div
                    class="col-12 col-lg-3 d-flex align-items-center flex-column mb-30 mb-lg-0"
                    class="about_section__text"
                    data-aos="fade-up"
                    data-aos-once="true"
                    data-aos-delay="50"
                    data-aos-duration="1000"
                >
                    <img
                        src="{{asset('img/public/adv-111.svg')}}"
                        alt=""
                        class="advantages_section__img mb-20"
                    />
                    <p class="advantages_section__text">
                        {{getTranslate('first_advantage.partners')}}
                    </p>
                </div>
                <div
                    class="col-12 col-lg-3 d-flex align-items-center flex-column mb-30 mb-lg-0"
                    class="about_section__text"
                    data-aos="fade-up"
                    data-aos-once="true"
                    data-aos-delay="100"
                    data-aos-duration="1000"
                >
                    <img
                        src="{{asset('img/public/adv-112.svg')}}"
                        alt=""
                        class="advantages_section__img mb-20"
                    />
                    <p class="advantages_section__text">
                        {{getTranslate('second_advantage.partners')}}
                    </p>
                </div>
                <div
                    class="col-12 col-lg-3 d-flex align-items-center flex-column mb-30 mb-lg-0"
                    class="about_section__text"
                    data-aos="fade-up"
                    data-aos-once="true"
                    data-aos-delay="150"
                    data-aos-duration="1000"
                >
                    <img
                        src="{{asset('img/public/adv-113.svg')}}"
                        alt=""
                        class="advantages_section__img mb-20"
                    />
                    <p class="advantages_section__text">
                        {{getTranslate('third_advantage.partners')}}
                    </p>
                </div>
                <div
                    class="col-12 col-lg-3 d-flex align-items-center flex-column"
                    class="about_section__text"
                    data-aos="fade-up"
                    data-aos-once="true"
                    data-aos-delay="200"
                    data-aos-duration="1000"
                >
                    <img
                        src="{{asset('img/public/adv-114.svg')}}"
                        alt=""
                        class="advantages_section__img mb-20"
                    />
                    <p class="advantages_section__text">
                        {{getTranslate('fourth_advantage.partners')}}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section
        class="feedback_section"
        class="about_section__text"
        data-aos="fade-up"
        data-aos-once="true"
        data-aos-delay="150"
        data-aos-duration="1000"
    >
        <div class="wrapper">
            <div class="row">
                <div class="col-12 mb-50 col-lg-4 offset-lg-1">
                    <form
                        action=""
                        class="mobile-feedback__form d-flex flex-column align-items-center"
                    >
                        <p class="mobile-feedback__title mb-15">{{getTranslate('become_partner.partners')}}</p>
                        <input
                            type="text"
                            class="mobile-feedback__input mobile-feedback__input-bordered mb-15"
                            placeholder="Имя"
                        />
                        <input
                            type="tel"
                            class="mobile-feedback__input mobile-feedback__input-bordered mb-15"
                            placeholder="Номер телефона"
                        />
                        <input
                            type="text"
                            class="mobile-feedback__input mobile-feedback__input-bordered mb-15"
                            placeholder="Сообщение"
                        />
                        <button type="submit" class="mobile-feedback__btn">
              <span>
                Отправить
              </span>
                        </button>
                    </form>
                </div>
                <div class="col-12 px-0 px-lg-3 col-lg-5 offset-lg-1">
                    <img
                        src="img/partners-image.jpg"
                        alt=""
                        class="feedback_section__image"
                    />
                </div>
            </div>
        </div>
    </section>
</main>
