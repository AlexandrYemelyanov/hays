import SalaryChecker from '../components/SalaryChecker/SalaryChecker.vue'
document.addEventListener('vueready', () => {
    const Vue = window.Vue
    new Vue({
        el: '#vm-salary-checker',
        components: {
            SalaryChecker
        }
    })
})