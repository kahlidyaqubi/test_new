import Vue from 'vue';
import { DocumentEditorContainerPlugin, DocumentEditorContainerComponent,Toolbar} from '@syncfusion/ej2-vue-documenteditor';

Vue.use(DocumentEditorContainerPlugin);

const app = new Vue({
    el: '#app',
    data() {
        return {
        };
    },
    provide: {
        DocumentEditorContainer: [Toolbar]
    }
});
import "@syncfusion/ej2-vue-documenteditor/styles/material.css";
import '@syncfusion/ej2-base/styles/material.css';
import '@syncfusion/ej2-vue-buttons/styles/material.css';
import '@syncfusion/ej2-vue-calendars/styles/material.css';
import '@syncfusion/ej2-vue-dropdowns/styles/material.css';
import '@syncfusion/ej2-vue-inputs/styles/material.css';
import '@syncfusion/ej2-vue-navigations/styles/material.css';
import '@syncfusion/ej2-vue-popups/styles/material.css';
import '@syncfusion/ej2-vue-schedule/styles/material.css';

