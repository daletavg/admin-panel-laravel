<?php

use Illuminate\Database\Seeder;

class TranslateSeeder extends Seeder
{
    private $transalateRepository;

    public function __construct()
    {
        $this->transalateRepository = new \App\Repository\TranslateRepository(app());
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->setTranslateData('posters', 'global', 'input', 'Афиша событий');
        $this->setTranslateData('history_events', 'global', 'input', 'История событий');
        $this->setTranslateData('about_company', 'global', 'input', 'О компании');
        $this->setTranslateData('partners', 'global', 'input', 'Партнерам');
        $this->setTranslateData('project_history', 'global', 'input', 'История проектов');
        $this->setTranslateData('our_services', 'global', 'input', 'Наши услуги');
        $this->setTranslateData('contacts', 'global', 'input', 'Контакты');
        $this->setTranslateData('social', 'global', 'input', 'Мы в соц. сетях');
        $this->setTranslateData('search', 'global', 'input', 'Поиск');

        $this->setTranslateData('our_partners', 'about', 'input', 'Наши партнеры');
        $this->setTranslateData('about_company_p', 'about', 'input', 'О компании');

        $this->setTranslateData('send_as', 'form', 'input', 'Напишите нам');
        $this->setTranslateData('send', 'form', 'input', 'Отправить');
        $this->setTranslateData('message', 'form', 'input', 'Сообщение');
        $this->setTranslateData('name', 'form', 'input', 'Имя');
        $this->setTranslateData('phone', 'form', 'input', 'Номер телефона');
        $this->setTranslateData('message', 'form', 'input', 'Сообщение');

        $this->setTranslateData('poster', 'general', 'input', 'Афиша событий');
        $this->setTranslateData('show_more', 'general', 'input', 'Показать еще');

        $this->setTranslateData('our_services', 'services', 'input', 'Наши услуги');
        $this->setTranslateData('first_title', 'services', 'input', 'ОРГАНИЗАЦИЯ КОНЦЕРТОВ');
        $this->setTranslateData('first_description', 'services', 'textaria', 'ARTPOINT - международное агентство, успешно развивающееся в сфере концертной деятельности уже более 10 лет. Диапазон наших проектов разнообразен: от классического и модерн балета, танго до современных шоу-программ. Мы сотрудничаем с лучшими концертными и театральными площадками Украины и ближнего зарубежья.');
        $this->setTranslateData('second_title', 'services', 'input', 'ОРГАНИЗАЦИЯ КОНЦЕРТОВ');
        $this->setTranslateData('second_description', 'services', 'textaria', 'ARTPOINT - международное агентство, успешно развивающееся в сфере концертной деятельности уже более 10 лет. Диапазон наших проектов разнообразен: от классического и модерн балета, танго до современных шоу-программ. Мы сотрудничаем с лучшими концертными и театральными площадками Украины и ближнего зарубежья.');
        $this->setTranslateData('third_title', 'services', 'input', 'ОРГАНИЗАЦИЯ КОНЦЕРТОВ');
        $this->setTranslateData('third_description', 'services', 'textaria', 'ARTPOINT - международное агентство, успешно развивающееся в сфере концертной деятельности уже более 10 лет. Диапазон наших проектов разнообразен: от классического и модерн балета, танго до современных шоу-программ. Мы сотрудничаем с лучшими концертными и театральными площадками Украины и ближнего зарубежья.');
        $this->setTranslateData('fourth_title', 'services', 'input', 'ОРГАНИЗАЦИЯ КОНЦЕРТОВ');
        $this->setTranslateData('fourth_description', 'services', 'textaria', 'ARTPOINT - международное агентство, успешно развивающееся в сфере концертной деятельности уже более 10 лет. Диапазон наших проектов разнообразен: от классического и модерн балета, танго до современных шоу-программ. Мы сотрудничаем с лучшими концертными и театральными площадками Украины и ближнего зарубежья.');
        $this->setTranslateData('fifth_title', 'services', 'input', 'ОРГАНИЗАЦИЯ КОНЦЕРТОВ');
        $this->setTranslateData('fifth_description', 'services', 'textaria', 'ARTPOINT - международное агентство, успешно развивающееся в сфере концертной деятельности уже более 10 лет. Диапазон наших проектов разнообразен: от классического и модерн балета, танго до современных шоу-программ. Мы сотрудничаем с лучшими концертными и театральными площадками Украины и ближнего зарубежья.');
        $this->setTranslateData('sixth_title', 'services', 'input', 'ОРГАНИЗАЦИЯ КОНЦЕРТОВ');
        $this->setTranslateData('sixth_description', 'services', 'textaria', 'ARTPOINT - международное агентство, успешно развивающееся в сфере концертной деятельности уже более 10 лет. Диапазон наших проектов разнообразен: от классического и модерн балета, танго до современных шоу-программ. Мы сотрудничаем с лучшими концертными и театральными площадками Украины и ближнего зарубежья.');


        $this->setTranslateData('posters_events', 'history', 'input', 'Афиша событий');

        $this->setTranslateData('posters', 'partners', 'input', 'Партнерам');
        $this->setTranslateData('how_to', 'partners', 'input', 'КАК СТАТЬ НАШИМ ПАРТНЕРОМ');
        $this->setTranslateData('how_to_text', 'partners', 'ckeditor', ' <p class="become_section__text">
                        ARTPOINT - международное агентство, успешно развивающееся в сфере
                        концертной деятельности уже более 10 лет. Диапазон наших проектов
                        разнообразен: от классического и модерн балета, танго до современных
                        шоу-программ. <br />
                        <br />
                        Мы сотрудничаем с лучшими концертными и театральными площадками
                        Украины и ближнего зарубежья.
                    </p>');
        $this->setTranslateData('advantages', 'partners', 'input', 'Приемущества');
        $this->setTranslateData('first_advantage', 'partners', 'textaria', 'Успешно развиваемся в сфере концертной деятельности уже более 10 лет');
        $this->setTranslateData('second_advantage', 'partners', 'textaria', 'Успешно развиваемся в сфере концертной деятельности уже более 10 лет');
        $this->setTranslateData('third_advantage', 'partners', 'textaria', 'Успешно развиваемся в сфере концертной деятельности уже более 10 лет');
        $this->setTranslateData('fourth_advantage', 'partners', 'textaria', 'Успешно развиваемся в сфере концертной деятельности уже более 10 лет');
        $this->setTranslateData('become_partner', 'partners', 'textaria', 'Стать нашим партнером');


        $this->setTranslateData('event_other_city', 'events', 'input', 'Мероприятие в других городах');
        $this->setTranslateData('other_city', 'events', 'input', 'В ДРУГИХ ГОРОДАХ');
        $this->setTranslateData('video', 'events', 'input', 'Видео');
        $this->setTranslateData('gallery', 'events', 'input', 'Галерея');
        $this->setTranslateData('price', 'events', 'input', 'Цена от <span>%s</span> до <span>%s</span> грн');
        $this->setTranslateData('price_before', 'events', 'input', 'от %s грн');
        $this->setTranslateData('price_second', 'events', 'input', '%s - %s грн');

        $this->setTranslateData('date', 'events', 'input', 'Дата');
        $this->setTranslateData('time', 'events', 'input', 'Время');
        $this->setTranslateData('city', 'events', 'input', 'Город');
        $this->setTranslateData('place', 'events', 'input', 'Зал');
        $this->setTranslateData('price_table', 'events', 'input', 'Цена');

        $this->setTranslateData('buy', 'other', 'input', 'Купить');
        $this->setTranslateData('more', 'other', 'input', 'Подробнее');
    }

    private function setTranslateData(string $key, string $group, string $type, string $rusData)
    {
        $nonLocalizeData = [
            'comment' => null,
            'key' => $key,
            'group' => $group,
            'type' => $type
        ];
         $data=[
                'ru' => [
                    'data' => $rusData
                ],
                'uk' => [
                    'data' => $rusData
                ],
                'en' => [
                    'data' => $rusData
                ],
            ];
        $transalte = $this->transalateRepository->create($nonLocalizeData);
//        dd($transalte);
        $this->transalateRepository->createLangData($transalte->id, $data);
        $this->transalateRepository->addTranslate($transalte);
    }
}
