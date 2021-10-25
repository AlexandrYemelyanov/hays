$(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
        mySelect.find('option:selected').prop('disabled', true);
        mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
        mySelect.find('option:disabled').prop('disabled', false);
        mySelect.selectpicker('refresh');
    });

    function verifyForm(){
        if (!$.trim($('[name="job_title"]').val())){
            alert('Пожалуйста, введите название вакансии');
            return false;
        }
        if (!$('[name="job_industry"]').val()){
            alert('Пожалуйста, выберите индустрию из предложенного списка.');
            return false;
        }
        if (!$.trim($('[name="job_salary_from"]').val()) || !$.trim($('[name="job_salary_to"]').val())){
            alert("Пожалуйста, проверьте диапазон заработной платы");
            return false;
        }

        if (tinymce.editors[0] != undefined){
            $('[name=editpost]').val(tinymce.editors[0].getContent());
            if (!$.trim($('[name="editpost"]').val())){
                alert('Пожалуйста, введите описание вакансии.');
                return false;
            }
        }

        var n = parseInt($("#job_salary_from").val());
        var m = parseInt($("#job_salary_to").val());

        if(n > m) {
            alert("Пожалуйста, проверьте диапазон заработной платы");
            return false;
        }
        $('#action').val('save_front_form_job');
        return true;
    }

    $('#update_front_form_job .post-job-btn').click(function(){ // кнопка сохранить

        if (!verifyForm())
            return false;

        $.post(ajaxurl, $('#update_front_form_job').serialize(), function(d){
            if (d.status == 'fail')
                alert(d.mess);
            else
                alert('Вакансия опубликована на сайте');
            location.reload();
        }, 'json');
    });

    $('.open-page-job-to-site').click(function(){ // кнопка открыть
        if (!$(this).data('job_id')){
            if (!verifyForm())
                return false;

            $.post(ajaxurl, $('#update_front_form_job').serialize(), function(d){
                if (d.status == 'fail')
                    alert(d.mess);
                else
                    location.href = $('.open-page-job-to-site').attr('href');
            }, 'json');
            return false;
        }
    });


    $('#update_front_form_job .save-draft-job-btn').click(function(){

        $('#action').val('save_draft_front_form_job');

        console.log('Save draft');

        $('[name=editpost]').val(tinymce.editors[0].getContent());
        $.post(ajaxurl, $('#update_front_form_job').serialize(), function(d){
            if (d.status == 'fail')
                alert(d.mess);
            else
                alert('Вакансия сохранена в черновики');
            location.reload();

        }, 'json');
    });

    function update_city(country){
        var str = '';
        for(i in cityes[country]){
            str += '<option value="'+i+'"'+(cityes[country][i].selected == 1? ' selected="selected"' : '' )+'>'+cityes[country][i].name+'</option>';
        }

        if (str)
            $('#locations_2').html(str).prop('disabled', false);
        else
            $('#locations_2').html('').prop('disabled', true);
    }

    $('#locations').change(function(){
        update_city($('#locations').val());
    });
    update_city($('#locations').val());

});