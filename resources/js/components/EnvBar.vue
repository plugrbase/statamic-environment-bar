<template></template>
<script>
/**
 * Register this component with:
 * Vue.component('env-bar', require('./path/to/EnvBar.vue'))
 */
export default {
  mixins: [Fieldtype],

  props: {
    color: String,
    message: String,
  },
  data() {
    return {};
  },
  created() {},
  mounted() {
    let style = '';
    if (this.color != '') {
      style = 'style="background-color:' + this.color + ' !important;"';
    }

    let envBarHtml = '<div class="p-0 m-0 w-full">';
    envBarHtml +='<div class="py-1 px-1 text-sm w-full bg-grey-80 text-white text-right" ' + style + '>';
    envBarHtml += this.message;
    envBarHtml += '</div>';
    envBarHtml += '</div>';

    let statamicWrapper = document.querySelector('#statamic');
    statamicWrapper.classList.add('show-env-bar');

    let wrapper = document.createElement('div');
    wrapper.innerHTML = envBarHtml;
    wrapper.classList.add('w-full');
    wrapper.classList.add('fixed');
    wrapper.classList.add('z-1000');

    let statamicGlobalHeader = document.querySelector('.global-header');
    statamicGlobalHeader.parentNode.insertBefore(wrapper, statamicGlobalHeader);
    statamicGlobalHeader.classList.remove('fixed');

    wrapper.appendChild(statamicGlobalHeader);
  },
  watch: {},
  methods: {
    //
  },
};
</script>
