<div class="ito-navset">
    <div class="logo">
        <table>
            <tr>
                <td><?php if (function_exists('contact_detail')) { contact_detail('name'); }?></td>
                <td><span>t&nbsp;</span><?php if (function_exists('contact_detail')) { contact_detail('phone'); }?></td>
            </tr>
            <tr>
                <td><span><?php if (function_exists('contact_detail')) { contact_detail('address'); }?></span></td>
                <td><span>m&nbsp;</span><?php if (function_exists('contact_detail')) { contact_detail('mobile'); }?></td>
            </tr>
            <tr>
                <td><span><?php if (function_exists('contact_detail')) { contact_detail('woonplaats'); }?></span></td>
                <td><span>e&nbsp;</span><?php if (function_exists('contact_detail')) { contact_detail('email'); }?></td>
            </tr>
        </table> 
    </div>
    <div class="ito-nav-bar-search">        
        <div class="ito-nav-bar">        
            <ul class="ito-nav-ul" style="text-align:left"><?php wp_list_categories('orderby=order&depth=1&title_li='); ?></ul>    
        </div>
    </div>
</div>
