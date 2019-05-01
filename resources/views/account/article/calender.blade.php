
    <style>
        .schedule-celltemplate.e-schedule .e-month-view .e-work-cells {
            position: relative;
        }

        .schedule-celltemplate.e-schedule .templatewrap {
            text-align: center;
            position: absolute;
            width: 100%;
        }

        .schedule-celltemplate.e-schedule .templatewrap img {
            width: 30px;
            height: 30px;
        }

        .schedule-celltemplate.e-schedule .caption {
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: middle;
        }
        .e-past-app {
            background-color: chocolate !important;
        }
    </style>

    <div id='app'>
        <!--readonly='true'-->
        <div id='container'>
            <ejs-schedule :height='height'  ref='scheduleObj' :event-rendered='onEventRendered' :selected-date='selectedDate' :views = 'views' :event-settings='eventSettings'>
                <e-resources>
                    <e-resource :field="'OwnerId'" :title="'Owner'" name="'Owners'"  :data-source='resourceDataSource' textField='OwnerText' idField='Id' colorField='OwnerColor'>
                    </e-resource>
                </e-resources>
            </ejs-schedule>

        </div>
    </div>

    <script src="/js/chate.js"></script>


