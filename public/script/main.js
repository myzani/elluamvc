$(document).ready(function(){

var isClicked = false;
var frmTeachNext = '', frmImgNext = '', frmNameNext = '', frmQuoteNext = '';
var frmTeachPrev = '', frmImgPrev = '', frmNamePrev = '', frmQuotePrev = '';
var currentImg = '', tId = '';


$('.carousel').carousel();
$('#cd-dropdown').dropdown();
$('#clear-search').hide();
//Enables tooltip
$('.social').tooltip();
//Enables popover in contact
hidePopOver();
    
if($('#pId h4').text() !== "") {
    $('#pId').slideDown();
    $('#pBody').css({'margin-top': '0px', 'padding': '0px 0px 15px 0px'});
}
    
//Highlights a selected menu
var url = window.location.pathname
var urlRegExp = new RegExp(url.replace(/\/$/,''));   
$("li").removeClass("active"); 
$('#menu li a').each(function(){
    if(urlRegExp.test(this.href))
    {
        switch(url) 
        {
            case '/': 
                $('.home').addClass('active');      break;
            case '/about/company':
                $('.company').addClass('active');   break;
            case '/course':
                $('.course').addClass('active');    break;
            case '/payment':
                $('.payment').addClass('active');   break;
            case '/contact':
                $('.contact').addClass('active');   break;
        }
    }
});
    
// Toggle slide to the right for search input
$(this).on('click', '#search', function(){
    var clrSearch = $('#clear-search');
    var vInputSearch = $('.inputSearch');
    var _token   = $(this).find('input[name=_token]').val();
    
    if(vInputSearch.val() != ""){
        // Call to search method to query db
        displaySearch(vInputSearch, clrSearch, _token);
    }else{
        vInputSearch.animate({ width: 'toggle'}, 150);
    }
    $('.inputSearch').focus();
});
    
$(this).on('submit', '#frmSearch', function(e){
    e.preventDefault();
    $('#search').trigger("click");
});
    
$(this).on('keyup', '.inputSearch', function(){
    var $this = $(this);
    $('#clear-search').show().click(function(){
        $this.val('');
        $this.focus();
        $(this).hide();
    });
    
    if($this.val() == ""){
        $('#clear-search').hide();
    }
});
    
// Call to overlay position and prevent vscroll from moving
$(this).on('click', 'input[id*="signUp"]', function(){
    var id = $(this).attr('id');
    var country = $('#country').val();
    
    $('.overlay').fadeIn();
    $('.frame').slideDown(100); 
    $('.fHdr').html('<h3>'+country+'</h3>');
    $('.frame p').html('Do you want to signed up for <b>'+ $(this).val() +'</b>?');
    $('.frame').append('<a href="http://elluamvc.dev/contact/'+id.substring(6)+'" class="btn btn-primary">Yes</a>');
    $('body').css('overflowY', 'hidden').on('mousewheel', function(e){
        e.preventDefault();
    });
});

$(this).on('click', '#close', function(e){
   overlayDefault();
});
    
$(this).on('keyup', 'html, body', function(e){
    if(e.which == 27) {
       overlayDefault();
    }
});
    
// Call teachers overlay gallery    
$(this).on('click', '.teachImgWrap', function(){
    resetTeachOverlay();
    var $this = $(this),
        frmTeachImg = $this.find("img").attr('src'),
        frmTeachName = $this.find("span:first").text(),
        frmQuote = $this.find("span:last").text(),
        tId = $this.find("input").val(),
        exp = "";

    currentImg = $this;
    exp = displayExpert(tId);
    // Displays center image
    $('#frameTeach').html(teachImgOvrlay(frmTeachImg, frmTeachName, "teachImgLarge", frmQuote, exp))

    $('.overlay').fadeIn();
    $('.frameTeach').fadeIn(300).css({'-webkit-transform':'', '-webkit-transition':''});
    
    if($this.next().find("img").attr('src') != null) {
        frmImgNext = $this.next().find("img").attr('src');
        frmNameNext = $this.next().find("span:first").text();
        frmQuoteNext = $this.next().find("span:last").text();
        
        $('#frameNext').html(teachImgOvrlay(frmImgNext, frmNameNext, "nextTeach", frmQuoteNext, exp))
        $('#nxtIco').show();
        $('.frameNext').fadeIn("slow").css({'-webkit-transform':'', '-webkit-transition':''});
    } else {
        $('#nxtIco').hide();
        $('#frameNext').fadeOut();
    }
    
    if($this.prev().find("img").attr('src') != null) {
        frmImgPrev = $this.prev().find("img").attr('src');
        frmNamePrev = $this.prev().find("span:first").text();
        frmQuotePrev = $this.prev().find("span:last").text();
        
        $('#framePrev').html(teachImgOvrlay(frmImgPrev, frmNamePrev, "prevTeach", frmQuotePrev, exp))
        $('#prevIco').show();
        $('.framePrev').fadeIn("slow").css({'-webkit-transform':'', '-webkit-transition':''});
    } else {
        $('#prevIco').hide();
        $('#framePrev').fadeOut();
    }
});    
// Animate teacher overlay - next image
$(this).on('click', '#nxtIco', function(){
    resetTeachOverlay();
    var nextImg = currentImg.next(), 
        exp = "";
    
    if(nextImg.find("img").attr("src") != null) {
        frmImgNext = nextImg.find("img").attr("src");
        frmNameNext = nextImg.find("span:first").text();
        frmQuoteNext = nextImg.find("span:last").text();
        tId = nextImg.find("input").val()
        currentImg = nextImg;
        exp = displayExpert(tId);

        $('#frameNext').html(teachImgOvrlay(frmImgNext, frmNameNext, "nextTeach", frmQuoteNext, exp));
        resetTeachOverlay();
        $('.frameNext').css({'-webkit-transform':'translateX(-886px)', 'height':'75%', 'top':'15%',
               '-webkit-transition':'-webkit-transform .3s, height 0.3s', 'opacity': '1', 'z-index':'1005'});
        $('.nextTeach').css({'height':'350px'});
        $('.frameTeach').css({'-webkit-transform':'translateX(-872px)', 'height':'445px', 'top':'120px',
               '-webkit-transition':'-webkit-transform .3s', 'opacity': '0.6', 'z-index':'1005'});
        $('.teachImgLarge').css({'height':'300px'});
        $('.framePrev').css({'-webkit-transform':'translateX(-872px)', '-webkit-transition':'-webkit-transform .3s'});
        $('.nextTeach').css({'height':'350px'});
        
        
        $('#frameNextShadow').html(teachImgOvrlay(frmImgNext, frmNameNext, "nextTeachShadow", frmQuoteNext, exp));
        $('#frameNextShadow').fadeIn();
        $('#nxtIco').show();
    } else { $('#nxtIco').hide(); }
});
    
// previous image   
$(this).on('click', '#prevIco', function(){
    resetTeachOverlay();
    var prevImg = currentImg.prev(), 
        exp = "";
    if(prevImg.find("img").attr("src") != null) {
        $('.frameNext').css({'-webkit-transform':'translateX(-0px)', '-webkit-transition':'-webkit-transform .3s'});
        $('.frameTeach').css({'-webkit-transform':'translateX(-0px)', '-webkit-transition':'-webkit-transform .3s'});
        $('.framePrev').css({'-webkit-transform':'translateX(-0px)', '-webkit-transition':'-webkit-transform .3s'});
    }
});
    
// Show payments method
$(this).on('click', '.ulDrop', function(e){
	var vCntry = $('.drpdown').val();

	$.ajax({
		type: 'get',
		contentType: "application/json; charset=utf-8",
		url: "payments",
		data: { vId: vCntry },
		dataType: 'json'
	}).done(function(data){
        var vHtml = "";
        
        $.each(data, function(key, item){
            vHtml += '<tr>';
            vHtml += '<td>'+item['hdr_payment']['rate']+'</td>';
            vHtml += '<td>'+item['tuition']+ ' ' +item['tuitCurr'] +'</td>';
            vHtml += '<td>'+item['charge']+'</td>';
            vHtml += '<td>'+item['hdr_payment']['description']+'</td>';
            vHtml += '<td><input type="radio" name="signup" id="signUp' +item['id']+ '"value="'+ item['hdr_payment']['rate'] +'"/></td>';
            vHtml += '<td><input type="hidden" id="country" name="country" value="'+ item['country']['country_name'] +'"/>';
            vHtml += '</tr>';
        });
        
        $('#paydesc').html(vHtml);
	});
});
    
// Submit contact details 
$(this).on('submit', '#frmContact, .frmpaypal', function(e){
    var action   = $(this).prop('action');
    var vName    = $('#name').val();
    var vEmail   = $('#email').val();
    var vSubj    = $('#subject').val();
    var vMsg     = $('#message').val();
    var vRate    = "";
    var vCName   = "";
    var _token   = $(this).find('input[name=_token]').val();
    
    if($('#rate').length > 0 && $('#country_name').length > 0){
        vRate    = $('#rate').val();
        vCName   = $('#country_name').val();
    }
    
    var jsVal    = { _token: _token, name: vName, email: vEmail, subject: vSubj, message: vMsg, rate: vRate, cName: vCName };
    hidePopOver();
    $('#loader').show();
    
    $.post(action, jsVal, function(data){
        $.each(data, function(item, value) {
           if($.trim(value) !== "") {
               $('#'+item).attr({'class':'form-control errorMsg', 'data-toggle':'popover', 'data-container':'body', 
                                 'data-placement':'right', 'data-content':value});
           }
        $('.errorMsg').popover('show');
        });
    }, 'json').done(function(){
        $('#loader').hide();
//        $('#loadtxt').text('Your message has been sent! Thank you.');
    });
    e.preventDefault();
});

}); //end of document

//Returns the value of the url parameter
function getURLParameter(url, name) {
    return (RegExp(name + '=' + '(.+?)(&|$)').exec(url)||[,null])[1];
}

function teachImgOvrlay(teachImg, teachName, teachClass, teachQuote, expertise) {
    var teachPNod = "";
    teachPNod += '<img src="'+ teachImg +'" class="thumbnail pull-left '+ teachClass +'" alt="'+ teachName +'"/>';
    teachPNod += '<div class="expertList"><h4>Expertise in Teaching</h4>';
    teachPNod += expertise +'</div>';
    teachPNod += '<p class="quote">'+ teachQuote +'</p>';
   
    return teachPNod;
}

function resetTeachOverlay() {
    $('#frameTeach').removeClass().addClass('frameTeach').css({'height':'75%', 'top':'15%', 'opacity':'1'});
    $('#frameNext').removeClass().addClass('frameNext').css({'height':'445px', 'top':'120px', 'opacity':'0.6'});
    $('#framePrev').removeClass().addClass('framePrev').css({'height':'445px', 'top':'120px', 'opacity':'0.6'});
    $('.nextTeach').css('height', '300px');
    $('.prevTeach').css('height', '300px');
    $('.teachImgLarge').css('height', '350px');
    $('.frameTeach').css({'-webkit-transform':'', '-webkit-transition':''});
    $('.frameNext').css({'-webkit-transform':'', '-webkit-transition':''});
    $('.frameNextShadow').css({'-webkit-transform':'', '-webkit-transition':''});
    $('.framePrev').css({'-webkit-transform':'', '-webkit-transition':''});
    $('.framePrevShadow').css({'-webkit-transform':'', '-webkit-transition':''});
}

function displayExpert(tId) {
    var expert = "";
    $.ajax({
        type: 'get',
        async: false,
        contentType: "application/json; charset=utf-8",
        url: 'teachprexprt',
        data: { tId: tId },
        dataType: 'json',
    }).done(function(data){
        expert += "<ul>";
        $.each(data, function(key, val){
            expert += '<li>'+ val['description'] +'</li>';
        });
        expert += "</ul>";
    });
    return expert;
}

function overlayDefault() {
    $('.overlay').hide();
    $('#nxtIco').hide();
    $('#prevIco').hide();
    $('.frameSrch').hide();
    $('.frameTeach').css({'-webkit-transform':'scale(2,2)', '-webkit-transition':'-webkit-transform 2s'}).fadeOut(300);
    $('.frameNext').css({'-webkit-transform':'scale(1.3,2)', '-webkit-transition':'-webkit-transform 2s'}).fadeOut(300);
    $('.frameNextShadow').css({'-webkit-transform':'scale(1.3,2)', '-webkit-transition':'-webkit-transform 2s'}).fadeOut(300);
    $('.framePrev').css({'-webkit-transform':'scale(1.3,2)', '-webkit-transition':'-webkit-transform 2s'}).fadeOut(300);
    $('.frame').slideUp(100);
    $('body').css('overflowY', 'scroll').unbind('mousewheel');
}

/* Call to search method to query db
 * @param string keyword input
 * @param string clear search
 * @param string prevent csrf
*/
function displaySearch(vInputSearch, clrSearch, _token) {
    var frame = "";
    $.ajax({
        type: 'get',
        contentType: "application/json; charset=utf-8",
        url: '/search',
        data: { _token: _token, keyword: vInputSearch.val() },
        dataType: 'json'
    }).done(function(data){
        if(data != "") {
            var rpp = 5, curr = 1,
                totalRecords = data.tRecords,
                numPages = Math.ceil(totalRecords/rpp),
		        keywords = vInputSearch.val().split(' '),
                _url = window.location.protocol + '//'+ window.location.host + '/';
            
//            console.log(data);

            var records = function(totalRecords, digit){
                if(digit) {
                    return (totalRecords <= 1 ? "0" + totalRecords : totalRecords);
                }
                return (totalRecords <= 1 ? "RESULT" : "RESULTS");
            };
            
            frame += '<p><h4>SEARCHING '+ vInputSearch.val() +' - <span class="cBadge"> '+ records(totalRecords, true) +'</span> '+
                  records(totalRecords, false) +'</h4></p>';
            // loop through data and highlight each key
            $.each(data.qResults, function(key, item){
                frame += highlightSearch(_url+item.page, item.title, item.description, keywords);
//                curr++;
            });
            frame += '<ul class="pagination pull-right">';
            frame += '<li><a href="#">&laquo;</a></li>';
            for(var i = 1; i <= numPages; i++) {
                if(curr == i){
                    frame += ' <li class="activeKey"><a>'+i+'</a></li> ';
                } else {
                    frame += ' <li class=""><a href="#">'+i+'</a></li> ';
                }
            }
            frame += '<li><a href="#">&raquo;</a></li>';
            frame += '</>';
        } else {
            frame += '<h4>SEARCHING FOR <i class="label label-warning">'+ vInputSearch.val().toUpperCase() +"</i> - 0 RESULT</h4>";
            frame += "<p>Sorry, but we couldn't find anything! Please try another search term.</p>";
        }
        
        $('.overlay').show();
        $('.frameSrch').html(frame).show().mouseover(function(){
            $(this).css('overflowY', 'scroll');
        }).mouseout(function(){ $(this).css('overflowY', 'hidden'); });
    }).always(function(){
        clrSearch.hide();
        vInputSearch.val('').animate({ width: 'hide'}, 150);
    });
}

/*
 * Highlight a search keyword for result query
 * @param string url link
 * @param string show title
 * @param string description of a title
 * @param array  list of search keywords
 * return formatted html with keywords being highlighted.
*/
function highlightSearch(page, title, description, keywords) {
    var regex, desc = "", matchKey, currPos, repKey;
        frame = '<a href="'+ page +'"><h4><span class="label label-info frmSrchBg">'+ title +'</span></h4></a>';
        for(var src in keywords){
            regex = new RegExp(keywords[src], "ig");
            matchKey = description.match(regex);
            if(matchKey !== null){
                for(var i in matchKey) {
                    currPos = description.search(matchKey[i]);
                    repKey = '<i>'+description.substr(currPos, matchKey[i].length)+'</i>';
                    if(desc == "")
                        desc = description.replace(matchKey[i], repKey);
                    else
                        desc = desc.replace(new RegExp(matchKey[i], "g"), repKey);
                }
            }
        }
        frame += '<p class="well well-xs">'+desc+'</p>';
	return frame;
}

function paginate(rpp, curr, totalRecords) {
	var numPages = Math.ceil(totalRecords/rpp);
	
	if(prevpage() >= 1)
	  prevpage(curr);
	else if(nextpage() <= numPages)
	  nextpage(curr);
}

function offset(curr, rpp) {
    return (curr - 1) * rpp;
}

function nextpage(curr) {
    return curr + 1;
}

function prevpage() {
    return curr - 1;
}

//Hides popover when there is a value to a certain control
function hidePopOver() {
    $('.errorMsg').on('shown.bs.popover', function () {
        if($(this).val() != "") {
            $(this).popover('hide');
        }
    });
}
