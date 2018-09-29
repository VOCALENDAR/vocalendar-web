jQuery(function($) {
    function parse_date(dstr) {
        var day, hour, m, min, mon, offset, ret, sec, year;
        if (m = dstr.match(/^(\d{4})-(\d{2})-(\d{2})$/)) {
            return new Date(parseInt(m[1], 10), parseInt(m[2], 10) - 1, parseInt(m[3], 10), 0, 0, 0);
        }
        offset = (new Date()).getTimezoneOffset() * 60 * 1000;
        year = mon = day = null;
        hour = min = sec = 0;
        if (m = dstr.match(/^(\d{4})-(\d{2})-(\d{2})[T ](\d{2}):(\d{2}):(\d{2}(?:\.\d+)?)(Z|([+-])(\d{2}):(\d{2}))$/)) {
            year = parseInt(m[1], 10);
            mon = parseInt(m[2], 10);
            day = parseInt(m[3], 10);
            hour = parseInt(m[4], 10);
            min = parseInt(m[5], 10);
            sec = parseInt(m[6], 10);
            if (m[7] !== "Z") {
                offset += (m[8] === "+" ? 1 : -1) * (parseInt(m[9], 10) * 60 + parseInt(m[10], 10)) * 1000 * 60;
            }
        } else {
            return new Date(1970, 1, 1, 0, 0, 0);
        }
        ret = new Date(new Date(year, mon - 1, day, hour, min, sec).getTime() - offset);
        return ret;
    }

    function fillDetailData(data, status, xhr) {
        var container = $("#EventDetail");
        if (!data.entry) return false;
        var entry = data.entry;

        var wday = new Array(7);
        wday[0] = "SUN";
        wday[1] = "MON";
        wday[2] = "TUE";
        wday[3] = "WED";
        wday[4] = "THU";
        wday[5] = "FRI";
        wday[6] = "SAT";

        var start = parse_date(entry.gd$when[0].startTime);
        var is_allday = entry.gd$when[0].startTime.indexOf(':') < 0;
        container.find(".body .title").text(entry.title.$t);
        container.find(".body .start .date").text(start.getFullYear()+"年"+(start.getMonth()+1)+"月"+start.getDate()+"日");
        if (!is_allday)
            container.find(".body .start .time").text(start.getHours()+"時"+start.getMinutes()+"分");
        var end = parse_date(entry.gd$when[0].endTime);
        container.find(".body .end .date").text(end.getFullYear()+"年"+(end.getMonth()+1)+"月"+end.getDate()+"日");
        if (!is_allday)
            container.find(".body .end .time").text(end.getHours()+"時"+end.getMinutes()+"分");

        container.find(".badge .month").html(start.getFullYear()+"年/"+(start.getMonth()+1)+"月");
        container.find(".badge .day").html(start.getDate());
        container.find(".badge .dow").html(wday[start.getDay()]);

        if (entry.gd$where[0].valueString)
            container.find(".body .where").text(entry.gd$where[0].valueString);
        container.find(".content").html($("<span />").text(entry.content.$t).html().replace(/\n/g, "<br>"));

        if ($.fn.autolink) {
            container.find(".body .where").autolink();
            container.find(".content").autolink();
        }
    }

    function loadDetail(feedurl) {
	if (feedurl.substr(0, 38) != "https://www.google.com/calendar/feeds/") return;
        $.ajax({
            url: feedurl+"?alt=json",
            dataType: "jsonp",
            success: fillDetailData
        });
    }
    if (/feedurl=([^;&]+)/.exec(location.search))
        loadDetail(decodeURIComponent(RegExp.$1));
});
