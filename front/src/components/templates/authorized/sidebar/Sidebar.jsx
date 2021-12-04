import { ProSidebar , SidebarHeader , SidebarContent , SidebarFooter, Menu, MenuItem, SubMenu } from 'react-pro-sidebar';
import 'react-pro-sidebar/dist/css/styles.css';
import './Sidebar.css' ;
import React from 'react';


function Sidebar(){
    return (

        <ProSidebar>
            <SidebarHeader>
                {/**
                 *  You can add a header for the sidebar ex: logo
                 */}
            </SidebarHeader>
            <SidebarContent>
                <Menu iconShape="square">
                    <MenuItem>Dashboard</MenuItem>
                    <SubMenu title="Components">
                    <MenuItem>Component 1</MenuItem>
                    <MenuItem>Component 2</MenuItem>
                    </SubMenu>
                </Menu>
            </SidebarContent>
            <SidebarFooter>
                {/**
                 *  You can add a footer for the sidebar ex: copyright
                 */}
            </SidebarFooter>
        </ProSidebar>
    );
}

export default Sidebar;