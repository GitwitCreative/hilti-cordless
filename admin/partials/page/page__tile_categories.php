<?php
$section = $page->tile->categories;
?>
<div class="__list__item">
    <?php
    $toggle__header__id        = 'tile__categories';
    $toggle__header__title     = 'Categories';
    $toggle__header__subtitle  = '';
    $toggle__header__show_icon = true;

    //    include('partials/toggle__header.php');
    ?>

    <div class="__list__item__content" id="<?php echo $toggle__header__id; ?>">
        <?php
        $categories_children = [];

        for ($j = 1; $j <= 24; $j++) {
            $child = $section->categories->{'child-' . $j};

            array_push($categories_children, [
                [
                    'id'    => 'link_link',
                    'name'  => 'Link URL',
                    'value' => $child->link_link
                ]
            ]);
        }

        $form__item__section = $page__section_name;
        $form__item__id      = 'categories';
        $form__item__items   = [
            [
                'id'    => 'title',
                'name'  => 'Title',
                'required' => true,
                'value' => $section->title
            ], [
                'id'    => 'sub_title',
                'required' => true,
                'name'  => 'Sub title',
                'value' => $section->sub_title
            ], [
                'id'     => 'description',
                'required' => true,
                'name'   => 'Description',
                'type'   => 'textarea',
                'value'  => $section->description
            ], [
                'id'    => 'video',
                'required' => true,
                'name'  => 'Video',
                'value' => $section->video
            ], [
                'id'       => 'pategory-title',
                'type'     => 'title',
                'value'    => 'Categories',
                'title'    => 'Category',
                'name'     => 'categories',
//                'child-classes' => 'hidden',
                'children' => $categories_children
            ]
        ];

        include('partials/form/items.php');
        ?>
    </div>
</div>

