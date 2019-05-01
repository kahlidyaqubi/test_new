import Vue from 'vue';
import {SchedulePlugin, Day, Week, TimelineViews, Month, Agenda } from '@syncfusion/ej2-vue-schedule';
Vue.use(SchedulePlugin);

let data = [{
    Id: 1,
    Subject: 'Scrum Meeting',
    StartTime: '2019-04-10 06:48:45',
    EndTime: '2019-04-10 12:48:45',
    IsAllDay: false,
    //isReadonly:true,
    mopadara:'one',
    //isBlock:true,
    //RecurrenceRule: 'FREQ=DAILY;INTERVAL=1;COUNT=8',
    RecurrenceException:'20180130T043000Z',
    resourceDataSource:{ OwnerText: 'Nancy', Id: 1, OwnerColor: '#ffaa00' },

},
    {
        Id: 2,

        Subject: 'Scrum soso',
        mopadara:'tow',
        StartTime: '2019-04-15 06:48:45',
        EndTime: '2019-04-17 06:48:45',
        Description: 'Meeting time changed based on team activities.',
        RecurrenceID: 1,
        OwnerText: 'Nancy',
    }];

var app = new Vue({
    el:'#app',
    data (){
        return {
            height: '600px',
            views: ['Day', 'Week', 'TimelineWeek', 'Month', 'Agenda'],
            resourceDataSource: [
                { OwnerText: 'Nancy', Id: 1, OwnerColor: '#ffaa00' },
                { OwnerText: 'Steven', Id: 2, OwnerColor: '#f8a398' },
                { OwnerText: 'Michael', Id: 3, OwnerColor: '#7499e1' }
            ],
            eventSettings: {
                dataSource:  data
            },
            selectedDate: new Date(),


        }
    },
    computed: {
        mycomputedattr: function () {
            return this.eventSettings.dataSource;
        },
    },
    watch: {

        mycomputedattr: function (value, oldval) {
            console.log(value);
        },

    },
    methods: {
        isReadOnly: function(data) {
            return (data.EndTime < this.$refs.scheduleObj.ej2Instances.selectedDate);
        },
        onEventRendered: function(args) {
            if (args.data.mopadara=="one") {
                args.element.classList.add('e-past-app');
            }
        },

    },
    provide: {
        schedule: [Day, Week, TimelineViews, Month, Agenda]
    }
});

import '@syncfusion/ej2-base/styles/material.css';
import '@syncfusion/ej2-vue-buttons/styles/material.css';
import '@syncfusion/ej2-vue-calendars/styles/material.css';
import '@syncfusion/ej2-vue-dropdowns/styles/material.css';
import '@syncfusion/ej2-vue-inputs/styles/material.css';
import '@syncfusion/ej2-vue-navigations/styles/material.css';
import '@syncfusion/ej2-vue-popups/styles/material.css';
import '@syncfusion/ej2-vue-schedule/styles/material.css';