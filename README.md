<!--
 * @Author: jackning 270580156@qq.com
 * @Date: 2025-01-22 06:45:13
 * @LastEditors: jack ning github@bytedesk.com
 * @LastEditTime: 2025-01-22 09:51:06
 * @Description: bytedesk.com https://github.com/Bytedesk/bytedesk
 *   Please be aware of the BSL license restrictions before installing Bytedesk IM – 
 *  selling, reselling, or hosting Bytedesk IM as a service is a breach of the terms and automatically terminates your rights under the license. 
 *  仅支持企业内部员工自用，严禁私自用于销售、二次销售或者部署SaaS方式销售 
 *  Business Source License 1.1: https://github.com/Bytedesk/bytedesk/blob/main/LICENSE 
 *  contact: 270580156@qq.com 
 *  联系：270580156@qq.com
 * Copyright (c) 2025 by bytedesk.com, All Rights Reserved. 
-->
# ByteDesk Chat for WooCommerce

ByteDesk客服系统的WooCommerce插件集成方案，支持在WooCommerce商店中嵌入ByteDesk在线客服功能。

## 功能特点

- 在WooCommerce商店中集成ByteDesk在线客服系统
- 支持在WooCommerce后台配置客服widget的个性化设置
- 自动显示在商品页面和购物车页面
- 支持移动端适配

## 安装说明

1. 下载插件压缩包
2. 在WordPress后台进入"插件 > 安装插件"页面
3. 点击"上传插件"按钮，选择下载的压缩包
4. 安装完成后启用插件
5. 进入"WooCommerce > 设置 > ByteDesk客服"进行相关配置

## 配置说明

在WooCommerce后台设置中，您可以配置以下选项：

- ByteDesk工作组ID
- 客服窗口标题
- 客服窗口位置（左下角/右下角）
- 自动弹出时间
- 显示页面选择
- 其他个性化设置

## 系统要求

- WordPress 5.0+
- WooCommerce 3.0+
- PHP 7.0+

## 技术支持

如需技术支持，请访问：https://www.bytedesk.com/support

## 版权信息

© 2024 ByteDesk. All rights reserved.

```javascript
<!-- bytedesk.com -->
<script src="https://www.weiyuai.cn/embed/bytedesk-web.js"></script>
<script>
  const config = {
    baseUrl: 'http://127.0.0.1:9006',
    placement: 'bottom-right',
    autoPopup: false,
    inviteParams: {
      show: false,
      text: '需要帮助么',
    },
    bubbleConfig: {
      show: true,
      icon: '👋',
      title: '需要帮助么',
      subtitle: '点击我，与我对话'
    },
    theme: {
      theme: 'system',
      backgroundColor: '#0066FF',
      textColor: '#ffffff'
    },
    window: {
      width: '380'
    },
    chatParams: {
      org: 'df_org_uid',
      t: '2',
      sid: '1563916182225159'
    }
  };
  const bytedesk = new BytedeskWeb(config);
  bytedesk.init();
</script>
```
