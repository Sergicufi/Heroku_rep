import { shallowMount } from '@vue/test-utils';
import searchBarRes from '../../resources/js/components/searchBarRes.vue'

describe('searchBarRes.vue', () => {
    it('Prova barra de cerca', () => {
        const var1 = shallowMount(searchBarRes);
        expect(var1.find('input search-input2')).toBeDefined;
    });
});