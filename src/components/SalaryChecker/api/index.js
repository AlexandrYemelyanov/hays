const $ = window.jQuery
const wpData = window.salaryCheckerWP
const shortcodeBaseUrl = '/wp-json/salary-checker/v1'

function getSectors(industry) {
    return $.get({
        url: `${shortcodeBaseUrl}/sectors/`,
        data: {
            industry
        },
        dataType: 'json'
    })
}

function getPositions(params) {
    return $.get({
        url: `${shortcodeBaseUrl}/positions/`,
        data: {
            industry: params.industry,
            sector: params.sector
        },
        dataType: 'json'
    })
    .fail(res => {
        console.log(res)
    })
}


export default {
    getSectors,
    getPositions
}